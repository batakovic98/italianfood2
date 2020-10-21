<?php
session_start();
if(isset($_SESSION["korisnik"])){
	header("location: index.php");
}
include "konekcija.php";
if(isset($_POST['btnreg'])){
	$ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $sifra = $_POST['password'];
    $siframd5 = md5($sifra);
    $reIme = "/^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/";
    $rePrezime =  "/^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/";
    $validno = true;
    if(!preg_match($reIme, $ime)){
        $validno = false;
    }
    if(!preg_match($rePrezime, $prezime)){
        $validno = false;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validno = false;
    }
    if(empty($sifra)){
        $validno = false;
    }
    if($validno){
        $upit="INSERT INTO korisnici (ime, prezime, sifra, email, idUloga)
		VALUES (:ime, :prezime, :sifra, :email, '2')";
        $priprema = $konekcija->prepare($upit);
		$priprema->bindParam(':ime', $ime);
		$priprema->bindParam(':prezime', $prezime);
		$priprema->bindParam(':email', $email);
		$priprema->bindParam(':sifra', $siframd5);
		$rezultat = $priprema->execute();
	}
}



?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Italian food bar - Registracija</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link rel="fav icon" href="img/logo.png" />
	<meta name="keywords" content="registruj, ime, prezime, email"/>
	<meta name="description" content="Registrujte se kod nas."/>
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
				<h2 class="col-12 text-center tm-section-title">Registrujte se</h2>
				<p class="col-12 text-center">Registrujte se i postanite korisnik naših usluga! </p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				
					<div id="forma">
						<form action="registracija.php" method="post" class="tm-contact-form">
					        <div class="form-group">
							  <input type="text" name="ime" id="ime" class="form-control" placeholder="Ime" required="" />
							  <span id="greskaime"></span>
					        </div>

                            <div class="form-group">
							  <input type="text" name="prezime" id="prezime" class="form-control" placeholder="Prezime" required="" />
							  <span id="greskaprezime"></span>
					        </div>
					        
					        <div class="form-group">
							  <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="" />
							  <span id="greskamail"></span>
					        </div>

                            <div class="form-group">
							  <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="" />
							  <span id="greskapass"></span>
					        </div>
				
					        <div class="form-group tm-d-flex">
					          <button type="submit" id ="btnreg" name = "btnreg" class="tm-btn tm-btn-success tm-btn-right">
					            Registruj se
					          </button>
					        </div>
						</form>
						<span id="ispis"></span>
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
	<script src="js/script3.js"></script>
	
</body>
</html>