<?php
session_start();
include "konekcija.php";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $sifra = $_POST['password'];
    $siframd5 = md5($sifra);
    $validno = true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validno = false;
    } 
    if(empty($sifra)){
        $validno = false;
    }
    if($validno){
        $upit = "SELECT * FROM korisnici WHERE email = :email and sifra = :sifra";
        $priprema = $konekcija->prepare($upit);
        $priprema->bindParam(':email', $email); 
        $priprema->bindParam(':sifra', $siframd5);
        $rezultat = $priprema->execute();
        if($rezultat){
            if($priprema->rowCount()==1){
                $korisnik=$priprema->fetch();
				$_SESSION['korisnik']=$korisnik;
			}
        }
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
	<meta name="keywords" content="uloguj, email, lozinka"/>
	<meta name="description" content="Ulogujte se."/>
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
				<h2 class="col-12 text-center tm-section-title">Ulogujte se</h2>
				<p class="col-12 text-center">Ulogujte se da bi poručili naše proizvode! </p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				
					<div id="forma">
						<form action="login.php" method="post" class="tm-contact-form">
					        
					        <div class="form-group">
							  <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="" />
							  <span id="greskamail"></span>
					        </div>

                            <div class="form-group">
							  <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="" />
							  <span id="greskapass"></span>
					        </div>
				
					        <div class="form-group tm-d-flex">
					          <button type="submit" id ="login" name = "login" class="tm-btn tm-btn-success tm-btn-right">
					            Uloguj se
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
	<script src="js/script4.js"></script>
	
</body>
</html>