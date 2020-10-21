<?php 
include "konekcija.php";

$upit="SELECT *
FROM ikone i INNER JOIN slikei s
ON i.idSlikaI = s.id";

$rezultat = $konekcija->query($upit);

foreach($rezultat as $rez){

    echo "<div class='col-lg-4' id='donja'>
    <div class='tm-feature'>
        <img src='img/$rez->putanja' alt='$rez->alt' class='tm-feature-icon'/>
        <p class='tm-feature-description'>$rez->tekst</p>
        
        <div><p class='tm-feature-description'>$rez->opis</p></div>
    </div>
    
    </div>";
}






?>