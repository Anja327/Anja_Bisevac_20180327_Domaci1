<?php
require "../../dbBroker.php";
require "../../model/Kartica.php";

try {
    Kartica::add($_POST,$conn);
    echo "uspesno kreirana nova kartica";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>