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
	<title>Italian food bar - Home</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
	integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link rel="fav icon" href="img/logo.png" />
	<meta name="keywords" content="priča, zaposleni, istorija, restorana"/>
	<meta name="description" content="Posetit nas i uživajte u čarima italijanske kuhinje u prelepom abijentu našeg restorana."/>
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
				<p class="col-12 text-center">Posetit nas i uživajte u čarima italijanske kuhinje u prelepom abijentu našeg restorana. Ako niste u mogućnosti da dođete, poručite neki proizvod iz naše kuhinje i mi ćemo ga dostaviti na vašu kućnu adresu.</p>
			</header>
			
			<div class="row tm-paging-links" id="meni222">
				<div class="tm-paging-links" id="meni11">
				
				</div>
				<div class="tm-paging-links" id="meni111">
				
				</div>
			</div>
			

				

			<!-- Gallery -->
			
			<div class="tm-section tm-container-inner">
				<div class="row">
					<div class="col-12">
						<div class="tm-history-inner" >
							<div id="slajder">
								<img src="img/sl1.jpg" class = "prikazana" alt="slika1"/>
								<img src="img/sl2.jpg" alt="slika2"/>
								<img src="img/sl3.jpg" alt="slika3"/>
								<img src="img/sl4.jpg" alt="slika4"/>
								<img src="img/sl5.jpg" alt="slika5"/>
								<img src="img/sl6.jpg" alt="slika6"/>
						</div>
							<div class="tm-history-text"> 
								<h4 class="tm-history-title">O restoranu</h4>
								<p class="tm-mb-p">Svoju istoriju, Italian food bar započeo je 2012. godine kao porodični restoran na Zemunskom keju. Restoran je osnovao Nikola Mirotić, veliki gurman i zaljubljenik u italijansku kuhinju koji je svoju strast prema ukusima hteo da podeli sa drugima. 2014. godine restoran se seli na Novi Beograd, u Italijansku ulicu u kojoj se i dan danas nalazi.</p>
							</div>
						</div>	
					</div>
				</div>
			</div>

			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Naša priča</h2>
				<p class="col-12 text-center">Enterijer i letnja bašta su uređeni u tradicionalnom italijanskom stilu tako da u potpunosti gosti imaju osećaj kao da se nalaze negde na jugu Italije. Atmosfera u restoranu je opuštena a pri tom intimna, sa nenametljivom uslugom. Iako okružen brojnim poznatim beogradskim kafanama i restoranima, Italian food bar je svojim kvalitetom i različitošću postao jedno od kultnih mesta i sinonim za italijanski restoran u Beogradu. Veoma popularan i posećen, odoleva izazovima današnjice i osim što zadržva stare konstanto privlači nove goste. Pored domaćih, veliki broj gostiju čine i stranci koji žive ili se samo zatektnu u Beogradu.</p>
			</header>

			<div class="tm-container-inner tm-persons">
				<div class="row" id="zaposleni">
					<?php 
					
					include "zaposleni.php";
					
					?>
				</div>
			</div>
			
			<div class="tm-container-inner tm-features">
				<div class="row" id="ikone">
				<?php 
					
					include "ikone.php";
					
					?>
				</div>
			</div>
			<div class="tm-container-inner tm-history">
				<div class="row">
					<div class="col-12">
						<div class="tm-history-inner" >
							<div id="slajder1">
								<img src="img/s1.jpg" class = "prikazana1" alt="slika11"/>
								<img src="img/s2.jpg" alt="slika12"/>
								<img src="img/s3.jpg" alt="slika13"/>
								<img src="img/s4.jpg" alt="slika14"/>
								<img src="img/s5.jpg" alt="slika15"/>
						</div>
							<div class="tm-history-text"> 
								<h4 class="tm-history-title">Kratak istorijat</h4>
								<p class="tm-mb-p">Svoju istoriju, Italian food bar započeo je 2012. godine kao porodični restoran na Zemunskom keju. Restoran je osnovao Nikola Mirotić, veliki gurman i zaljubljenik u italijansku kuhinju koji je svoju strast prema ukusima hteo da podeli sa drugima. 2014. godine restoran se seli na Novi Beograd, u Italijansku ulicu u kojoj se i dan danas nalazi.</p>
							</div>
						</div>	
					</div>
				</div>
			</div>

				<div>


				
					<?php
					if(isset($_SESSION["korisnik"]) AND !isset($_SESSION["anketa"])){
					$upit = "SELECT korisnikId from anketa where korisnikId=".$_SESSION['korisnik']->id;
					$rezultat = $konekcija->query($upit);
					if($rezultat->rowCount()==0){
					echo "
					<div class='col-12 text-center' id='anketa'>
					<h2 class='col-12 text-center tm-section-title'>ANKETA</h2>
					<div class='card h-100'>
					<div class='single-post post-style-1'>
					<form action='anketa.php' method='post'>
					<h4 class='tm-gallery-title'> <b>Da li Vam se sajt dopada? </b></h4>
					<input class='tm-gallery-title' type='radio' name='odgovor' value='Da'/><b>DA</b><br/><br/>
					<input class='tm-gallery-title' type='radio' name='odgovor' value='Ne'/><b>NE</b><br/><br/>
					<button class='submit-btn' type='submit' id='posaljiOdg' name='posaljiOdg'><b>POŠALJI ODGOVOR</b></button>
					</form>
					</div>
					</div>
					</div>";
					}
					else{
						$upit1 = "SELECT COUNT(odgovor) as da
						from anketa where odgovor='Da'";
						$rezultat1 = $konekcija->query($upit1);
						$upit2 = "SELECT COUNT(odgovor) as ne
						from anketa where odgovor='Ne'";
						$rezultat2 = $konekcija->query($upit2);
						foreach($rezultat1 as $da){
						foreach($rezultat2 as $ne){
						echo "<div class='col-12 text-center' id='anketa'>
						<div class='card h-100'>
						<div class='single-post post-style-1'>
						<form action='index.php' method='post'>
						<h4 class='tm-gallery-title'> <b>Da li Vam se sajt dopada? </b></h4>
						<b class='tm-gallery-title'>Broj korisnika kojima se sviđa $da->da</b><br/><br/>
						<b class='tm-gallery-title'>Broj korisnika kojima se ne sviđa $ne->ne</b>
						</form>
						</div>
						</div>
						</div>";
						}
						}
					}		
					
					}
					if(isset($_SESSION["korisnik"]) AND isset($_SESSION["anketa"])){
						$upit1 = "SELECT COUNT(odgovor) as da
						from anketa where odgovor='Da'";
						$rezultat1 = $konekcija->query($upit1);
						$upit2 = "SELECT COUNT(odgovor) as ne
						from anketa where odgovor='Ne'";
						$rezultat2 = $konekcija->query($upit2);
						foreach($rezultat1 as $da){
						foreach($rezultat2 as $ne){
						echo "<div class='col-12 text-center' id='anketa'>
						<div class='card h-100'>
						<div class='single-post post-style-1'>
						<form action='index.php' method='post'>
						<h4 class='tm-gallery-title'> <b>Da li Vam se sajt dopada? </b></h4>
						<b class='tm-gallery-title'>DA - broj odgovora $da->da</b><br/><br/>
						<b class='tm-gallery-title'>NE - broj odgovora $ne->ne</b>
						</form>
						</div>
						</div>
						</div>";
						}
						}
					
					
					}
					?>

				</div>
			
		
		
		
		
			

			




		</main>

		<footer class="tm-footer text-center">
			<?php
			
			include "futer.php";
			
			?>
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/script1.js"></script>

</body>
</html>