<?php 
include "konekcija.php";

$upit="SELECT *
FROM zaposleni za INNER JOIN slikez s
ON za.idSlikaZ = s.id";

$rezultat= $konekcija->query($upit);

foreach($rezultat as $z){

    echo "<article class='col-lg-6'>
    <figure class='tm-person'>
        <img src='img/$z->putanja' alt='$z->alt' class='img-fluid tm-person-img' />
        <figcaption class='tm-person-description'>
            <h4 class='tm-person-name'>$z->ime $z->prezime</h4>
            <p class='tm-person-about'>$z->radnoMesto</p>
            <p class='tm-person-about'>$z->opis</p>
        </figcaption>
    </figure>
</article>";
}





?>