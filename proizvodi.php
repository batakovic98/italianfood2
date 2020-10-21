<?php 

session_start();
include "konekcija.php";



?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Italian food bar - Proizvodi</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link rel="fav icon" href="img/logo.png" />
	<meta name="keywords" content="Italian, salata, pasta, pica"/>
	<meta name="description" content="Atmosfera u restoranu je opuštena a pri tom intimna, sa nenametljivom uslugom."/>
	<meta name="robots" content="noindex, follow"/>
</head>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->
<body> 

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<a href="index.html"><img src="img/logo.png" alt="Logo" class="tm-site-logo"/></a> 
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Italian food bar</h1>
								<h6 class="tm-site-description">Italijanski duh u Beogradu</h6>	
							</div>
						</div>
					</div>
					<nav class="col-12 tm-nav" id="meni">
							
								<?php
									include "meni.php";
			
								?>
							
						</nav>	
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Dobrodošli u Italian food bar</h2>
				<p class="col-12 text-center">Posetit nas i uživajte u čarima italijanske kuhinje u prelepom ambijentu našeg restorana. Ako niste u mogućnosti da dođete, poručite neki proizvod iz naše kuhinje i mi ćemo ga dostaviti na vašu kućnu adresu.</p>
			</header>

			<div class="row tm-paging-links" id="meni222">
				<div class="tm-paging-links" id="meni11">
								
				</div>
				<div class="tm-paging-links" id="meni111">
				
				

				</div>
			</div>

			<div class="row tm-gallery">
				
				<div id="tm-gallery-page-pizza" class="tm-gallery-page">
								<?php
									include "ispisProizvoda.php";
			
								?>
				</div> 
				
						
			</div>

			
		</main>

		<footer class="tm-footer text-center">
		<?php
			
			include "futer.php";
			
			?>
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/script2.js"></script>

</body>
</html>