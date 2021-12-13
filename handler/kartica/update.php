<?php
require "../../dbBroker.php";
require "../../model/Kartica.php";

try {
    $kartica = new Kartica($_POST['id'],$_POST['brojKartice'],$_POST['racun'],$_POST['korisnik'],$_POST['proizvodjac']);
    $kartica->update($conn);
    echo "uspesno izmenjena kartica";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>