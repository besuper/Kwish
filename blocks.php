<?php

//Gestion de connexion
session_start();

include 'g_panier.php';

function head($name){
	echo '<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Kwish - '.$name.'</title>

		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		</head>
	<body>';
}

function p_header(){
	$header = '<header>
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> contact@kwish.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 12 Rue du poisson</a></li>
					</ul>
					<ul class="header-links pull-right">';
					if(!empty($_SESSION["connected"])){
						$header = $header.'<li><a href="account.php"><i class="fa fa-user-o"></i> Mon compte ('.$_SESSION["prenom"].')</a></li>
						<li><a href="logout.php"><i class="fa fa-times" aria-hidden="true"></i></i> Deconnexion</a></li>';
					}
	$header = $header.'
						
					</ul>
				</div>
			</div>

			<div id="header">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>

						<div class="col-md-6">
							<div class="header-search">
								<form>
									<!--<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>-->
									<input class="input" placeholder="Faites des recherches">&nbsp;
									<input class="search-btn" type="submit" value="Recherchez">
								</form>
							</div>
						</div>

						<div class="col-md-3 clearfix">
							<div class="header-ctn">

								<div class="dropdown">
									<a href="">
										<i class="fa fa-shopping-cart"></i>
										<span>Panier</span>
										';
										if(!empty($_SESSION["connected"])){
											$header.='<div class="qty">'.getNumberArticle().'</div>';
										}
										$header.= '
									</a>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</header>';
		echo $header;
}

?>