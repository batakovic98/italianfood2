<?php
    include "konekcija.php";
    session_start();
    if(($_SESSION['korisnik']->idUloga) != 1){
        header("Location: index.php");
    }
    else{
        if(isset($_POST["unesi"])){
            $nazivP = $_POST["naziv"];
            $opis = $_POST["opis"];
            $cena = $_POST['cena'];
            $katId = $_POST["katId"];
            $katNaziv = $_POST["katNaziv"];
        
            
            $datoteka = $_FILES['slika'];
            $tmp = $datoteka['tmp_name'];
            $imeDat = $datoteka['name'];
            $velicina = $datoteka['size'];
            $naziv = $datoteka['type'];
        
            $novoIme = time().'_'.$imeDat;
            $src = "img/".$novoIme;

            $datAp = move_uploaded_file($tmp,$src);

            $upitSlike = "INSERT INTO slike(putanja, alt) VALUES ('$novoIme', '$nazivP')";
            $priprema=$konekcija->prepare($upitSlike);
            try{
                $priprema->execute();
                $idSlika =$konekcija->lastInsertId();

                $upitPro = "INSERT INTO proizvodi(naziv, opis, cena, idSlika, idKategorija) VALUES('$nazivP', '$opis', '$cena', '$idSlika', '$katId')";
                $priprema=$konekcija->prepare($upitPro);

                $priprema->execute();

                header("Location: admin.php");
        }
        catch(PDOException $e){
            echo "Greska".$e;
        }
    }else{
        echo ("Greška");
    }
}