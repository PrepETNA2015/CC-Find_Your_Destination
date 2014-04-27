<?php 
session_start();
session_set_cookie_params(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>

	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TravelGo</title>
    <!-- API Google MAP -->
		
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_KKhPDTUDZICpbiiZ8B-VVenk-H_CL0U&sensor=true"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/loading.css" rel="stylesheet">
	
	<script src="js/map.js" ></script>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- 
				You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) 
                <a class="navbar-brand logo-nav" href="index.php">
                    <img src="http://placehold.it/150x75&text=Logo">
                </a>
				-->
            </div>
        </div>  
    </nav>
	<!-- /.container -->
	
    <div class="container">
		<div class="jumbotron">
			<div class="row">
			<!-- Map -->
				<div class="col-lg-8 map" id="map-canvas" ></div>
			<!-- /Map -->

			<!-- Right Side -->
				<div class="col-lg-4" >
				<h2>Recherche Hôtels </h2>
					<form class="form-group">
						<div class="control-group">
							<label class="control-label" >Choisez votre destination:</label>
							<select class="form-control" id="et">
								<option value="0">Aucun option</option>
								<option value="cote">Cote</option>
								<option value="montagne">Montagne</option>
								<option value="'cote' AND type = 'montagne'">Cote et Montagne</option>
							</select>
						</div>
						<div class="control-group">
							<label class="control-label" >Étoiles:</label>
							<select class="form-control" id="et">
								<option value="0">Aucun option</option>
								<option value="1">Une  étoile &#9734 </option>
								<option value="2">Deux  étoiles &#9734&#9734 </option>
								<option value="3">Trois  étoiles &#9734&#9734&#9734 </option>
								<option value="4">Quatre  étoiles &#9734&#9734&#9734&#9734 </option>
								<option value="5">Cinq  étoiles &#9734&#9734&#9734&#9734&#9734 </option>
							</select>
						</div>
						<br />
						<div class="control-group">
							<label class="control-label" >Département:</label>
							<div class="navbar-search">
								<input id="dep_input" type="text" class="search-query" style="width: 100%;" placeholder="ex: 75 ou son nom Paris" onkeyup="showResult(this.value,'dep')">
								<div id="dep_search" style="background-color:white;position:absolute;width:100%;"></div>
							</div>
						</div>
						<br />
						<div class="control-group">
							<label class="control-label" >Ville:</label>
							<div class="controls">
								<input id="ville_input" type="text" class="search-query" style="width: 100%;" placeholder="ex: Paris" onkeyup="showResult(this.value,'ville')">
								<div id="ville_search"></div>
							</div>
						</div>
						<br />
						
						<div class="control-group">
							<label class="control-label" >Recherche par nom:</label>
							<div class="navbar-search">
								<input id="hotel_nom_input" type="text" class="search-query" style="width: 100%;" placeholder="Nom d'hôtel" onkeyup="showResult(this.value,'hotel_nom')">
								<div id="hotel_nom_search"></div>
							</div>
						</div>
						<!-- Charging image -->
							<div class="col-lg-4" style="position:absolute;text-align:center;margin-left:35%;">
								<div id="floatingBarsG" style="display:none;"><div class="blockG" id="rotateG_01"></div><div class="blockG" id="rotateG_02"></div><div class="blockG" id="rotateG_03"></div><div class="blockG" id="rotateG_04"></div><div class="blockG" id="rotateG_05"></div><div class="blockG" id="rotateG_06"></div><div class="blockG" id="rotateG_07"></div><div class="blockG" id="rotateG_08"></div></div>
							</div>
						<!-- /Charging image -->
						<br />
					</form>
				</div>
		<!-- /Right side -->
			</div>
		</div>
		<!-- Details -->
		<hr class="hr">
			<div class="jumbotron" >
				<div class="row" >
					<div class="col-lg-5" id="details">
						<h3>Cliquez sur un marker </br> pour avoir les détails d'hôtel</h3>
					</div>
					<div class="col-lg-5" id="details2">
						<h3>Cliquez sur un bouton </br> pour avoir les lieu d,intérêt voisin</h3>
					</div>
					<div class="btn-group-vertical" style="text-align: center;">
						<br />
						<br />
						<button type="button" class="btn btn-info" onclick="tourisme('cine')">Cinéma</button>
						<br />
						<button type="button" class="btn btn-info" onclick="tourisme('musee')">Musée</button>
						<br />
						<button type="button" class="btn btn-info" onclick="tourisme('vilage_vac')">Village vacance</button>
						<br />
					</div>
				</div>				
			</div>
		<!-- /Details -->
	</div>			
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script> 
    <script src="js/bootstrap.js"></script> 
	<script src="js/script.js"></script>
	
	
</body>

</html>
