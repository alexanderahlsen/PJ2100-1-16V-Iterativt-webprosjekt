<?php
    $conn = GetMyConnection($g_link);
?>

			<section class="main_image"></section>
			
			<section class="feed">
			
			<?php
				if ($conn->num_rows > 0) {
				// output data of each row
				while($row = $conn->fetch_assoc()) {
					$kategori = $row["kategori"];
					$avdeling = $row["avdeling"];
					
					if($row["kategori"] == 1) {
			?>
				
				<div class="feed_item">
					<span class="content">
						<span class="category">Nyhet</span>
						<img src="uploads/<?php echo $row["bilde"]?>" alt="Nyhet bilde" class="feed_image" >
						<a href="nyhet.php?id=<?php echo $row["id"]?>"><h1><?php echo $row["tittel"]?></h1></a>
						<p><?php echo $row["ingress"]?>...</p>
					</span>
					<span class="logo">
					<?php
						if($avdeling == 1) {
							echo "<img src='img/Logo_emblem2.svg'>";
						} elseif($avdeling == 2) {
							echo "<img src='img/Logo_emblem3.svg'>";
						} elseif($avdeling == 3) {
							echo "<img src='img/logo.png'>";
						} else {
							echo "<img src='img/Logo_emblem1.svg'>";
						}
					?>
					</span>
				</div>				
			
			<?php
				} else {
						echo "ingen nyheter";
					}
				}
					} else {
						echo "0 results";
					}
			?>
			
			</section>
	