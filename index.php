<?php include_once 'functions.php'; ?>
<?php include_once 'header.html'; ?>


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

<?php include_once 'footer.html'; ?>