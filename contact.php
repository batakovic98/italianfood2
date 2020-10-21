<?php
session_start();

include "konekcija.php";

if(isset($_POST["posalji"])){
    $ime = $_POST["ime"];
    $email = $_POST["email"];
    $poruka = $_POST["poruka"];
    $reIme = "/^[A-ZŽĆČŠĐ][a-zžćčšđ]{2,14}$/";
    $reEmail = "/^([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])([A-Z]|[a-z]|[0-9]|[\_\%\.\+\-])+\@[a-z]+\.([a-z]+\.)?[a-z]{2,4}$/";
    $validno = true;

    if(!preg_match($reIme, $ime)){
        $validno = false;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validno = false;
    }
    if(empty($poruka)){
        $validno = false;
    }
    if($validno){
    $mailto = "nikola.batakovic.65.17@ict.edu.rs";
    $heder = "Od: ".$email;
    $tekst = "Primili ste poruku od: ".$ime." \n\n".$poruka;

    mail($mailto, $tekst, $heder);
    header("Location: contact.php?mailsent");
    }
}

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Italian food bar - Kontakt</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link rel="fav icon" href="img/logo.png" />
	<meta name="keywords" content="kontakt, adresa, lokacija, Italijanska, 20"/>
	<meta name="description" content="Kontaktirajte nas."/>
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
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/simple-house-01.jpg">
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
				<h2 class="col-12 text-center tm-section-title">Kontaktirajte nas</h2>
				<p class="col-12 text-center"></p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="#" method="POST" class="tm-contact-form">
					        <div class="form-group">
							  <input type="text" name="ime" id="ime" class="form-control" placeholder="Ime" required="" />
							  <span id="greskaime"></span>
					        </div>
					        
					        <div class="form-group">
							  <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="" />
							  <span id="greskamail"></span>
					        </div>
				
					        <div class="form-group">
							  <textarea rows="5" name="poruka" id="poruka" class="form-control" placeholder="Poruka" required=""></textarea>
							  <span id="greskaarea"></span>
					        </div>
					
					        <div class="form-group tm-d-flex">
					          <button type="submit" id="posalji" name="posalji" class="tm-btn tm-btn-success tm-btn-right">
					            Pošalji
					          </button>
					        </div>
						</form>
						<span id="ispis"></span>
					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Naša lokacija</h4>
							<address>
								Naša adresa je <b>Italijanska 20</b> na Novom Beogradu, u planu je otvaranje još jednog lokala na Dorćolu.
							</address>
							<a href="tel:080-090-0110" class="tm-contact-link">
								<i class="fas fa-phone tm-contact-icon"></i>011-090-0110
							</a>
							<a href="mailto:info@company.co" class="tm-contact-link">
								<i class="fas fa-envelope tm-contact-icon"></i>italianfood@gmail.com
							</a>
							<div class="tm-contact-social" id="ikonice">
								
							</div>
						</div>
					</div>
				</div>
			</div>
            
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
			<div class="tm-container-inner-2 tm-map-section">
				<div class="row">
					<div class="col-12">
						<div class="tm-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.9668958995626!2d20.352109814924365!3d44.80186328541422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6f3ec253419d%3A0x92243f58610f17e9!2zSXRhbGlqYW5za2EgMjAsINCR0LXQvtCz0YDQsNC0IDExMDcw!5e0!3m2!1ssr!2srs!4v1584039832773!5m2!1ssr!2srs" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
	<script src="js/main3.js"></script>
	
</body>
</html>