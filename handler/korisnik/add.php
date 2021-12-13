<?php
require "../../dbBroker.php";
require "../../model/Korisnik.php";

try {
    Korisnik::add($_POST,$conn);
    echo "uspesno kreiran novi korisnik";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>