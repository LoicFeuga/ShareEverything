<!DOCTYPE html>
<html lang="fr">
	
	<?php
		include "php/classes/DataBase.php";
		//Connexion localhost
		$pdo = new DataBase("laudtayq","root","localhost","");

	?>
	<head>
		<meta charset="UTF-8">
		<title></title>
	
		<!-- Inclusion de bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-theme.css">


		<!-- Inclusion des feuilles de styles -->
		<link rel="stylesheet" type="text/css" href="css/index.css">
		


	</head>

	<body>
		
	<div class="container">
			<div class="row">
				<div class="col-lg-3"><button class="btn btn-info">Valider</button></div>
				<div class="col-lg-3"><button class="btn btn-info">Valider</button></div>
				<div class="col-lg-3"><button class="btn btn-info">Valider</button></div>
				<div class="col-lg-3"><button class="btn btn-info">Valider</button></div>				
			</div>
		</div>




		<!-- Inclusion des pages jquery -->
		<script src="https://code.jquery.com/jquery.min.js"></script>

		<!-- En local
		<script src="js/jquery/jquery.js"></script>
		-->

		<!-- Inclusion des pages JavaScript -->
		<script src="js/index.js"></script>

	</body>

</html>
				