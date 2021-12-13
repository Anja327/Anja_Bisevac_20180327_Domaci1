<?php
require "../../dbBroker.php";
require "../../model/Kartica.php";

if(!isset($_POST['id'])){
    echo "Id nije prosledjen";
    exit;
}

try {
    $kartica=new Kartica($_POST['id']);
    $korinik->deleteById($conn);
    echo "uspesno obrisana kartica";
} catch (Exception $ex) {
   echo $ex->getMessage();
}
?>