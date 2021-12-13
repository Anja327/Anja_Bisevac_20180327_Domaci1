<?php
require "../../dbBroker.php";
require "../../model/Korisnik.php";

if(!isset($_POST['id'])){
    echo "Id nije prosledjen";
    exit;
}

try {
    $korisnik=new Korisnik($_POST['id']);
    $korinik->deleteById($conn);
    echo "uspesno obrisan korisnik";
} catch (Exception $ex) {
   echo $ex->getMessage();
}
?>