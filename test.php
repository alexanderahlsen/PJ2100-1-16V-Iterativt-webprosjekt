<?php
    $conn = GetMyConnection();
    
    if ($conn->num_rows > 0) {
    	// output data of each row
		while($row = $conn->fetch_assoc()) {
        	echo "id: " . $row["id"]. " - Tittel: " . $row["tittel"]. " - Kategori " . $row["kategori"]. "<br>";
        	echo "<img src='". $row["bilde"]. "' ><br>";
        	echo "" . $row["tekst"]. "<br>";
        	echo "Avdeling: ". $row["avdeling"]. "<br>";

    	}
	} else {
    	echo "0 results";
	}
?>