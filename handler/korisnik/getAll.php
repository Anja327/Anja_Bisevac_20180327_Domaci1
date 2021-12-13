<?php
require "../../dbBroker.php";
require "../../model/Korisnik.php";

try {
    echo json_encode(Korisnik::getAll($conn));
} catch (Exception $ex) {
  echo json_encode([
      "greska"=>$ex->getMessage()
  ]);
}

?>