<?php

include "konekcija.php";
$upit = "SELECT * 
    FROM meni";

$rezultat = $konekcija->query($upit);

echo "<ul class='tm-nav-ul'>";
    foreach($rezultat as $li) {
        echo "<li class='tm-nav-li'><a href='$li->href' class='tm-nav-link'>$li->naziv</a></li>";
        
	}
if(isset($_SESSION['korisnik'])){
	echo "<li class='tm-nav-li'><a href='logout.php' class='tm-nav-link'>Log out</a></li>";
	
	if($_SESSION['korisnik']->idUloga == 1){
		echo "<li class='tm-nav-li'><a href='admin.php' class='tm-nav-link'>Admin</a></li>";
	}
}else{
    echo "<li class='tm-nav-li'><a href='registracija.php' class='tm-nav-link'>Registracija</a></li>";
    echo "<li class='tm-nav-li'><a href='login.php' class='tm-nav-link'>Log in</a></li>";
	
}
echo "</ul>";
?>