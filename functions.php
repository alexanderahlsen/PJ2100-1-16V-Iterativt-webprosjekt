<?php
/**
 * Westerdals Fjerdingen
 * 
 * @author			Alexander Ahlsen
 * @package 		Fjeringen
 * @version 		6./04.16 
 */	
	
error_reporting(0);
	
// Starting a session so we can create the hash token for the submit form
session_start();

/**
* First we set the database variable to a global one so we can use it everywhere.
* We then run a if statement to see if it's already set, if it is, we serve that one
* Next: Connecting to the DB, we are also stating utf8 for the data
* If we have any errors we serve a error message
**/
global $g_link;
if( $g_link )
	return $g_link;
$g_link = new mysqli("localhost", "thegeek_westerda", "passord123", "thegeek_fjerdingen");
$g_link->set_charset('utf8');
if ($g_link->connect_errno) {
	return "Det oppstod en feil ved tilkoblingen av MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/**
This is or main jewel. Here we get both the connection to the databse and the data. here we pass inn the $g_link to get the connection and the $id is the id of the post we want to get info for. If the $id variable is passed we choose the first extractor that only gets that sinle entry. If no $id is passed we go with the last selection, that one gets everything and sort it by date.
**/

function GetMyConnection($g_link, $id) {   
	if($id) {
		$sql = "SELECT id, tittel, kategori, bilde, tekst, ingress, avdeling, dato FROM Nyheter WHERE id = '$id'";
	} elseif(!$id) {
		$sql = "SELECT id, tittel, kategori, bilde, tekst, ingress, avdeling, dato FROM Nyheter ORDER BY dato DESC";
	}
	$result = $g_link->query($sql);
		
	return $result;
}

/**
This functions test the input data and strips html and such
**/ 
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
		
	return $data;
}
 
?>