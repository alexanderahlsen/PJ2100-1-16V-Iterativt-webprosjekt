<?php
/**
 * Westerdals Fjerdingen
 * 
 * @author			Alexander Ahlsen
 * @package 		Fjeringen
 * @version 		6./04.16 
 */	
	
	// Get the connection to the DB and the latest posts
    $conn = GetMyConnection($g_link);
?>

			<section class="main_image"></section>
			
			<section class="feed">
			
			<?php
				// If there is more then 0 news we move on to showing the content, if it's empty we display a error message
				if ($conn->num_rows > 0) {
				// Loop trough output data of each row
				while($row = $conn->fetch_assoc()) {
					$kategori = $row["kategori"];
					$avdeling = $row["avdeling"];
					
					// If the data belongs in category 1 or 3 we display them, if it's category 2 we don't display them. We only want news and events on the front page
					if($row["kategori"] == 1 || $row["kategori"] == 3) {
			?>
				
				<div class="feed_item">
					<span class="content">
						<span class="category">
						<!-- Display the name of the category -->
						<?php if($row["kategori"] == 1) {
							echo "<a href='feed.php?id=1' >Nyhet</a>";
							} elseif($row["kategori"] == 3) {
							echo "<a href='feed.php?id=3' >Arrangement</a>";
							}
						?>	</span>
						<!-- Post image -->
						<img src="uploads/<?php echo $row["bilde"]?>" alt="Nyhet bilde" class="feed_image" >
						<!-- Post title and link -->
						<a href="nyhet.php?id=<?php echo $row["id"]?>"><h1><?php echo $row["tittel"]?></h1></a>
						<!-- Showing a short summary -->
						<p><?php echo $row["ingress"]?>...</p>
					</span>
					<!-- Displaying the associated logo for the department -->
					<span class="logo">
					<?php
						if($avdeling == 1) {
							echo "<img src='img/Logo_emblem2.svg'>";
						} elseif($avdeling == 2) {
							echo "<img src='img/Logo_emblem3.svg'>";
						} elseif($avdeling == 3) {
							echo "<img src='img/westerdals.svg' class='westerdals_logo'>";
						} else {
							echo "<img src='img/Logo_emblem1.svg'>";
						}
					?>
					</span>
				</div>				
			<?php
				}
				}
					} else {
						echo "0 results";
					}
			?>
			
			</section>
	