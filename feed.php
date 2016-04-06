<?php include_once 'functions.php'; ?>
<?php include_once 'header.html'; ?>

<?php
    $conn = GetMyConnection($g_link);
    $kategoriId = $_GET['id'];
?>
			<section class="main_image"></section>
			
			<section class="feed">
			
			<?php
				if ($conn->num_rows > 0) {
				// output data of each row
				while($row = $conn->fetch_assoc()) {
					$kategori = $row["kategori"];
					$avdeling = $row["avdeling"];
					
					if($row["kategori"] == $kategoriId) {
			?>
				
				<div class="feed_item">
					<span class="content">
						<span class="category">
						<?php if($kategoriId == 1) {
								echo "<a href='feed.php?id=1' >Nyhet</a>";
							} elseif($kategoriId == 2) {
								echo "<a href='feed.php?id=2' >Prosjekt</a>";
							} elseif($row["kategori"] == 3) {
								echo "<a href='feed.php?id=3' >Arrangement</a>";
							}
						?>	</span>
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
	
<?php include_once 'footer.html'; ?>