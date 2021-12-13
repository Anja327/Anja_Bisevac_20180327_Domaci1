<?php
require "../../dbBroker.php";
require "../../model/Kartica.php";

try {
    echo json_encode(Kartica::getAll($conn));
} catch (Exception $ex) {
  echo json_encode([
      "greska"=>$ex->getMessage()
  ]);
}

?>