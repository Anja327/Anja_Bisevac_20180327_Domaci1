<?php
require "../../dbBroker.php";
require "../../model/Korisnik.php";

try {
    $korisnik = new Korisnik($_POST['id'],$_POST['ime'],$_POST['prezime'],$_POST['licnaKarta']);
    $korisnik->update($conn);
    echo "uspesno izmenjen korisnik";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>