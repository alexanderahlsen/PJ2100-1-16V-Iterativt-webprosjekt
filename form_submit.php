<?php include_once 'functions.php';
		include_once 'header.html';
	
	$user_token = $_POST['user_token'];
	$session_token = $_SESSION['user_token'];
	
	//We check if the token of the page and session match!
	if($user_token == $session_token) {
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["bilde"]["name"]);
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
    
    // Check if file already exists
	if (file_exists($target_file)) {
    	echo "Vi beklager men bildet du lastet opp ser ut til å allerede eksistere.";
		$uploadOk = 0;
	}
	
	 // Check file size
	if ($_FILES["bilde"]["size"] > 500000) {
    	echo "Vi beklager men det ser ut som bildet ditt er for stort.";
		$uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    	echo "Vi beklager, men vi tillater kun JPG, JPEG, PNG & GIF.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
    	echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
    	if (move_uploaded_file($_FILES["bilde"]["tmp_name"], $target_file)) {
        	$bilde = basename( $_FILES["bilde"]["name"]);
    	} else {
        	echo "Sorry, there was an error uploading your file.";
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