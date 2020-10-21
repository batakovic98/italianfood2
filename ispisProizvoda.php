<?php

include "konekcija.php";


$brojPoStrani = 8;
isset($_GET["strana"]) ? $strana=$_GET["strana"] : $strana=0;
				
if($strana>0){
    $start=($strana*$brojPoStrani)-$brojPoStrani;
}
else{
	$start=0;
}
$testUpit = "SELECT id from proizvodi";
$rezultatTest = $konekcija->query($testUpit);
$brojRez = $rezultatTest->rowCount();
$ukupno = $brojRez/$brojPoStrani;

$upit = "SELECT *
         FROM proizvodi p INNER JOIN slike s
         ON p.idSlika = s.id limit $start,$brojPoStrani";

$rezultat = $konekcija->query($upit);
echo"<div class='row tm-gallery'>";
foreach($rezultat as $p){

    echo"<article class='col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item'>
            <figure>
                <img src='img/$p->putanja' alt='$p->alt' class='img-fluid tm-gallery-img' />
                <figcaption>
                    <h4 class='tm-gallery-title'>$p->naziv</h4>
                    <p class='tm-gallery-description'>$p->opis</p>
                    <p class='tm-gallery-price'>$p->cena din</p>
                </figcaption>
            </figure>
            </article>";

}
echo "</div>";
echo"<div id='paginacija' class='col-12 text-center'>
	<a href='proizvodi.php?strana=1' class='tm-gallery-title'><i class='fas fa-angle-double-left'></i></a>";
	for($i=1;$i<$ukupno+1;$i++){
		echo "<a class='tm-gallery-title' href='proizvodi.php?strana=$i'>$i</a>";
	}
	echo "<a href='proizvodi.php?strana=".round($ukupno)."' class='tm-gallery-title'><i class='fas fa-angle-double-right'></i></a>
	</div>";


?>


















