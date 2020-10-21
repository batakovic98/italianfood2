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
                <h1 class="col-12 text-center">Proizvodi</h1>
				
			</header>

           

			

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row" id="admin">


                    <table id="tabelaProizvodi">
                    <tr>
                    <th class='tm-gallery-title'>Id</th>
                    <th class='tm-gallery-title'>Naziv</th>
                    <th class='tm-gallery-title'>Opis</th>
                    <th class='tm-gallery-title'>Cena</th>
                    <th class='tm-gallery-title'>Slika</th>
                    <th class='tm-gallery-title'>KatId</th>
                    
                    <th  class='tm-gallery-title'>Izmeni</th>
                    <th  class='tm-gallery-title'>Izbriši</th>
                    </tr>

                    <?php
                $upit = "SELECT p.id, p.naziv, p.opis, p.cena, p.idKategorija, s.putanja, s.alt from proizvodi p inner join slike s on p.idSlika=s.id";
                $rezultat = $konekcija->query($upit);
                foreach($rezultat as $rez){
                    echo "<tr>
                    <td class='tm-gallery-price'>$rez->id</td>
                    <td class='tm-gallery-title'>$rez->naziv</td>
                    <td class='tm-gallery-description'>$rez->opis</td>
                    <td class='tm-gallery-price'>$rez->cena din</td>
                    <td class='img-fluid tm-gallery-img'><img src='img/$rez->putanja' alt='$rez->alt'/></td>
                    <td class='tm-gallery-price'>$rez->idKategorija</td>
                    <td class='taster'><a href='izmeni.php?id=$rez->id'><input type='submit' class='btnNaruci' name='izmeni' class='tm-paging-item' value='Izmeni'/></a></td>
                    <td class='taster'><a href='izbrisi.php?id=$rez->id'><input type='submit' class='btnNaruci' name='izbrisi' class='tm-paging-item' value='Izbrisi'/></a></td>";
                }
                ?>
                </table> 





            <div id="unesi">
                <header class="row tm-welcome-section">
                    <h2 class="col-12 text-center tm-section-title">Unesi proizvod</h2>
                
				
			    </header>
                    <form action="unesi.php" method="POST" enctype="multipart/form-data">
                    <table id="insertTabela">
                    <tr>
                            <td class='tm-gallery-title'>Naziv</td>
                            <td><input type='text' name='naziv' class='form-control'/></td>
                            
                        </tr>
                        <tr>
                            <td class='tm-gallery-title'>Opis</td>
                            <td><textarea rows='4' cols='50' name='opis' class='form-control'></textarea></td>
                            
                        </tr>
                        <tr>
                            <td class='tm-gallery-title'>Cena</td>
                            <td><textarea name='cena' class='form-control'></textarea></td>
                            
                        </tr>
                        <tr>
                            <td class='tm-gallery-title'>Slika</td>
                            <td><input type="file" class='form-control' name="slika"/></td>
                            
                        </tr>
                        <tr>
                            <td class='tm-gallery-title'>KategorijaId</td>
                            <td><select id='sortiraj' name="katId" class='klasa' class='form-control'>
                                <option value='0'>Izaberi</option>
                                <option value='2'>2-Pica</option>
                                <option value='3'>3-Pasta</option>
                                <option value='4'>4-Salata</option>
                            </select></td>
                            
                        </tr>
                        <tr>
                            <td class='tm-gallery-title'>KategorijaNaziv</td>
                            <td><select id='sortiraj' name="katNaziv" class='klasa' class='form-control'>
                                <option value='0'>Izaberi</option>
                                <option value='2'>Pica</option>
                                <option value='3'>Pasta</option>
                                <option value='4'>Salata</option>
                            </select></td>
                            
                        </tr>
                        <tr>
                            
                            <td colspan='2'><button class='btnNaruci' type='submit' name='unesi'>Unesi</button></td>
                            
                        </tr>
                    </table>
                    </form>	    
            </div>


            <h3 class="col-12 text-center"><b>ANKETA INFORMACIJE</b></h3>
            
            <table id="tabelaAnketa">
            <tr>
            <th class='tm-gallery-title'>Ime</th>
            <th class='tm-gallery-title'>Prezime</th>
            <th class='tm-gallery-title'>Odgovor</th>
                    
            </tr>
            <?php
            $upit = "SELECT k.ime, k.prezime, a.odgovor from korisnici k inner join anketa a on k.id=a.korisnikId";
            $rezultat = $konekcija->query($upit);
            foreach($rezultat as $rez){
                echo "<tr>
                <td class='tm-gallery-title'>$rez->ime</td>
                <td class='tm-gallery-title'>$rez->prezime</td>
                <td class='tm-gallery-title'>$rez->odgovor</td>
                ";
            }

                    
            ?>
			</table>
            




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
	<script src="js/admin.js"></script>
	
</body>
</html>