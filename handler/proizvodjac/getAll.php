<?php
require "../../dbBroker.php";
require "../../model/Proizvodjac.php";

try {
    echo json_encode(Proizvodjac::getAll($conn));
} catch (Exception $ex) {
  echo json_encode([
      "greska"=>$ex->getMessage()
  ]);
}

?>