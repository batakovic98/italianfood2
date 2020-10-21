<?php

include "konekcija.php";

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $upit ="DELETE FROM proizvodi where id=$id";
        $priprema = $konekcija->prepare($upit);
        $rezultat = $priprema->execute();
        header("Location: admin.php");
    }
else{
    header("Location: index.php");
}