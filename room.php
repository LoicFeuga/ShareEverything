<!DOCTYPE html>
<html lang="fr">

<?php
include "php/classes/DataBase.php";
		//Connexion localhost
$pdo = new DataBase("laudtayq","root","localhost","");
session_start();
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

	<!-- NAV BAR START -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">ShareEverything</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					<li id="room"><a>Room : <label><?php  echo $_SESSION['room'];?></label></a></li> 
					<li id="pseudo"><a>Pseudo : <label><?php ; echo $_SESSION['pseudo'];?></label></a></li> 
				</ul>

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<!-- NAV BAR END -->



<div class="container">
		<div class="row">	
			<div id="displayTchat" class="col-lg-12 tchat">

			</div>

		</div>
		<div class="row">
			<input type="text" class="col-lg-12 margin-top" id="message"></input>
			<button class="col-lg-4 col-lg-offset-8 btn btn-info margin-top" id="send">Send</button>
		</div>
	</div>




	<!-- Inclusion des pages jquery -->
	<script src="https://code.jquery.com/jquery.min.js"></script>

		<!-- En local
		<script src="js/jquery/jquery.js"></script>
	-->

	<!-- Inclusion des pages JavaScript -->
	<script src="js/room.js"></script>

</body>

</html>
