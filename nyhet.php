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


<?php 
	// Getting the id from the URL and sending that to our DB extraction
	$id = $_GET['id'];
	$nyhet = GetMyConnection($g_link, $id);
	
	// Getting the data out
	$row = $nyhet->fetch_assoc();
	
	// Using html_entity_decode to decode the coded html from the DB
	$txt_entity = $row['tekst'];
	$txt = html_entity_decode($txt_entity);
	
	// Formatting the date
	$originalDate = $row['dato'];
	$newDate = date("l j F, Y", strtotime($originalDate));
	
	?>
	
	<!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $row['tittel']; ?></h1>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Postet <?php echo $newDate; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="uploads/<?php echo $row["bilde"]?>" alt="">

                <hr>

                <!-- Post Content -->
                <div class="lead"><?php echo $txt; ?></div>

                <hr>
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Categories Well -->
                <div class="well">
                    <div class="row">
                        <div class="col-lg-6">
	                        <h4>Snarveier</h4>
                            <ul class="list-unstyled">
                                <li><a href="index.php">Nyheter</a>
                                </li>
                                <li><a href="feed.php?id=3">Arrangementer</a>
                                </li>
                                <li><a href="feed.php?id=2">Prosjekter</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
	                        <h4>Send inn...</h4>
                            <ul class="list-unstyled">
                                <li><a href="index.php?side=submit_nyheter">En nyhet</a>
                                </li>
                                <li><a href="index.php?side=submit_prosjekt">Et prosjekt</a>
                                </li>
                                <li><a href="index.php?side=submit_arrangement">Et arrangement</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Sidebar 2 -->
                <div class="well">
                    <h4>Om Fjerdingen</h4>
                    <p>Westerdals skule ha et nytt campus, og det ble Westerdals Fjerdingen! Her skal alle fra teknologi, kunstfag, kommunikasjon og ledelse være.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

<!-- include the footer -->
<?php include_once 'footer.html'; ?>