<?php
session_start();
include "konekcija.php";
if(!isset($_SESSION["korisnik"])){

    header("location: index.php");
    
}
else{
    if($_SESSION["korisnik"]->idUloga!= 1){
        header("location: index.php");
        }
}
if(isset($_GET["id"])){
    $id = $_GET["id"];
    if(isset($_POST["izmeni"])){
        $naziv = $_POST["naziv"];
        $opis = $_POST["opis"];
        $cena = $_POST["cena"];
        $katId = $_POST["katId"];
        
        
        
    
        $upit ="UPDATE proizvodi 
        SET naziv='$naziv', opis='$opis', cena='$cena', idKategorija='$katId' where id='$id'";
        $priprema = $konekcija->prepare($upit);
        $rezultat = $priprema->execute();
        header("Location: admin.php");

    
    }


}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Italian food bar - Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link rel="fav icon" href="img/logo.png" />
	<meta name="keywords" content="Admin, unesi, proizvod"/>
	<meta name="description" content="Admin panel."/>
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
                <h2 class="col-12 text-center tm-section-title">Admin panel</h2>
                <h1 class="col-12 text-center">Izmenite proizvod</h1>
				
			</header>

           

			

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row" id="izmeni">

                <?php
                if(isset($_GET["id"])){
                $id = $_GET["id"];
                $upit="SELECT p.naziv, p.opis, p.cena, k.naziv, k.id from proizvodi p inner join kategorije k on p.idKategorija=k.id
                 where p.id=$id";
                $rezultat = $konekcija->query($upit);
                $rez = $rezultat->fetch();
                echo "<form action='izmeni.php?id=$id' method='POST' enctype='multipart/form-data'>
                <table id='insertTabela'>
                <tr>
                    <td class='tm-gallery-title'>Naslov</td>
                    <td><input type='text' name='naziv' class='form-control' value='$rez->naziv'/></td>
                    
                </tr>
                <tr>
                    <td class='tm-gallery-title'>Tekst</td>
                    <td><textarea rows='4' cols='50' name='opis' class='form-control'>$rez->opis</textarea></td>
                    
                </tr>
                <tr>
                    <td class='tm-gallery-title'>Cena</td>
                    <td><textarea name='cena' class='form-control'>$rez->cena</textarea></td>
                    
                </tr>
                <tr>
                    <td class='tm-gallery-title'>KategorijaId</td>
                    <td><select id='sortiraj' name='katId' class='klasa' class='form-control'>
                    <option value='$rez->id' selected>$rez->id-$rez->naziv</option>
                    <option value='2'>2-Pica</option>
                    <option value='3'>3-Pasta</option>
                    <option value='4'>4-Salata</option>
                </select></td>
                    
                </tr>
                <tr>
                    
                    <td colspan='2'><button class='btnNaruci' type='submit' name='izmeni'>Izmeni</button></td>
                    
                </tr>
                </table>
                </form>";
                } 
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
	<script src="js/main5.js"></script>

	
</body>
</html>