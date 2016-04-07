<?php
/**
 * Westerdals Fjerdingen
 * 
 * @author			Alexander Ahlsen
 * @package 		Fjerdingen
 * @version 		6./04.16 
 */	
 
// Include both the functions.php (database connection etc) and the header.html for the template
include_once 'functions.php';
include_once 'header.html';
	
// Reading the user token sent by the form and reading the user session token
$user_token = $_POST['user_token'];
$session_token = $_SESSION['user_token'];
	
//We check if the token of the page and session match! If it matches we move on to the juicy stuff!
if($user_token == $session_token) {
		
	// The path to store downloads
	$path = "uploads/";

	// Inside the uploads folder we want to store everything in folder of /year/month/file.extension
	// If the directory for month or year doesn't exist we create it.
	$year_folder = $path . date("Y");
	$month_folder = $year_folder . '/' . date("m");
		
	!file_exists($year_folder) && mkdir($year_folder , 0777);
	!file_exists($month_folder) && mkdir($month_folder, 0777);
		
	$target_file = $month_folder . '/' . basename($_FILES["bilde"]["name"]);

	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	if (isset($_POST['submit'])) {
		$tittel =  test_input($_POST['tittel']);
		$kategori =  test_input($_POST['kategori']);
		$dato =  test_input($_POST['dato']);
		$avdeling =  test_input($_POST['avdeling']);
		$ingress =  test_input($_POST['ingress']);
		$artikkel = test_input($_POST['artikkel']);
		
		$checkImage = getimagesize($_FILES["bilde"]["tmp_name"]);
		
		if($check !== false) {
	        $uploadOk = 1;
	    } else {
	        $uploadOk = 0;
	    }
		
		 // Check file size
		if ($_FILES['bilde']['size'] > 10485760) {
	    	echo "Vi beklager men det ser ut som bildet ditt er for stort.";
			$uploadOk = 0;
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	    	echo "Vi beklager, men vi tillater kun JPG, JPEG, PNG & GIF.";
			$uploadOk = 0;
		}
		
		// If the file exists we want to add a number to the name to still upload it
		$t=0;
		
		while(file_exists($target_file)){
		    $target_file = $month_folder . '/' . basename($_FILES["bilde"]["name"]);
		    $target_file = substr($target_file,0,strpos($target_file,"."))."_$t".strstr($target_file,".");
		    $t++;
	  	}
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
	    	echo "Vi beklager, men filen ble ikke lastet opp (kode: 0101)";
		// if everything is ok, try to upload file
		} else {
	    	if (move_uploaded_file($_FILES["bilde"]["tmp_name"], $target_file)) {
	        	$bilde = $target_file;
	    	} else {
	        	echo "Vi beklager men det var en feil under opplastingen av bildet. (kode:132)";
	    	}
		}
	
		$insert_data = mysqli_query($g_link, "INSERT INTO Nyheter (tittel, kategori, bilde, avdeling, ingress, tekst, dato) VALUES ('$tittel', '$kategori', '$bilde', '$avdeling', '$ingress', '$artikkel', '$dato')");
		
		if ($insert_data) {
	    	echo '<center><h1>Takk for din innsendelse!</h1></center>';
	    	echo "<p>Du blir sendt videre</p></center>";
	    	echo "<script>setTimeout(function(){window.location.href='index.php'},5000);</script>";
		} else {
	    	echo '<center><h1>Det skjedde noe feil, vi sende deg tilbake om 10 sekunder</h1></center>';
	    	echo "<script>setTimeout(function(){window.location.href='index.php?side=submit_nyheter'},5000);</script>";
		}
	}
} else {
	echo "Ser ut som dette ikke gikk som det skulle, vi sender deg tilbake til start igjen!";
	echo "<script>setTimeout(function(){window.location.href='index.php?side=submit_nyheter'},5000);</script>";
}

mysqli_close($g_link);
include_once 'footer.html';
unset($_SESSION['user_token']);
?>