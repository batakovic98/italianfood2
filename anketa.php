<?php
session_start();
include "konekcija.php";
if(isset($_POST["posaljiOdg"])){
    $odgovor = $_POST["odgovor"];
    $upit = "INSERT INTO anketa (odgovor,korisnikId)
    VALUES ('$odgovor','".$_SESSION["korisnik"]->id."')";
    $priprema = $konekcija->prepare($upit);
    $rezultat = $priprema->execute();
	$_SESSION["anketa"] = $_SESSION["korisnik"]->id;
    header ("Location: index.php");
    }
?>