<?php include_once 'functions.php'; ?>
<?php include_once 'header.html'; ?>


<?php 
	$id = $_GET['id'];
	$nyhet = getNyhet($id, $g_link);
	
	$row = $nyhet->fetch_assoc();
	
	echo $row['tittel'];
	
	$txt_entity = $row['tekst'];
	$txt = html_entity_decode($txt_entity);
	echo $txt;
	
	?>

<?php include_once 'footer.html'; ?>