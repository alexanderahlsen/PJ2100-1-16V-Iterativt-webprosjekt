<?php
/**
 * Westerdals Fjerdingen
 * 
 * @author			Alexander Ahlsen
 * @package 		Fjeringen
 * @version 		6./04.16 
 */	 
 
 // Include both the functions.php (database connection etc) and the header.html for the template
 include_once 'functions.php';
 include_once 'header.html'; ?>


<!-- We are checking for any values behin ?side= and taking that value to pair it up with a asscoiating php file and displaying that -->
<?php
	if (!ini_get("register_globals")){
		foreach ($_REQUEST as $k=>$v){ 
			if (!isset($GLOBALS[$k])){ 
				${$k}=$v;
			} 
		} 
	} 
	if($side == "") { 
		include("home.php"); 
	} elseif($side)	{
		include("./$side.php"); 
	} 
?>

<!-- include the footer -->
<?php include_once 'footer.html'; ?>