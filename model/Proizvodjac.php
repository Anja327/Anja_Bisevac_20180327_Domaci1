<?php

class Proizvodjac{
    private $id;
    private $naziv;

    public function __construct($id=null, $naziv=null){
        $this->id = $id;
        $this->naziv = $naziv;
    }

    public static function getAll(mysqli $conn){
        $query = "SELECT * FROM korisnik";
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
        $data=[];
        $proizvodjac=$rezultat->fetch_assoc();
        while(isset($proizvodjac)){
            $data[]=$proizvodjac;
        }
    }
}

?>