<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Italian food bar - Autor</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link rel="fav icon" href="img/logo.png" />
	<meta name="keywords" content="autor, nikola, 65, 17"/>
	<meta name="description" content="Informacije o autoru."/>
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
				<h2 class="col-12 text-center tm-section-title">Informacije o autoru</h2>
				<p class="col-12 text-center"></p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6" id="autorSlika">
						
					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Bataković Nikola 65/17</h4>
							<address>
								Student Visoke ICT škole, veliki ljubitelj Italijanske kuhinje, sajt izrađen za potrebe predmeta Web programiranje PHP 1. 
							</address>
							
							<a href="mailto:nikola.batakovic.65.17@ict.edu.rs" class="tm-contact-link">
								<i class="fas fa-envelope tm-contact-icon"></i>nikola.batakovic.65.17@ict.edu.rs
							</a>
							
						</div>
					</div>
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
	<script src="js/main4.js"></script>
	
</body>
</html>