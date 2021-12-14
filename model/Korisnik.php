<?php

class Korisnik{
    private $id;
    private $ime;
    private $prezime;
    private $licnaKarta;

    public function __construct($id=null, $ime=null, $prezime=null, $licnaKarta=null){
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->licnaKarta = $licnaKarta;
    }

    public static function getAll(mysqli $conn){
        $query = "select * from korisnik";
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
        $data=[];
        while($korisnik=$rezultat->fetch_assoc()){
            $data[]=$korisnik;
        }
        return $data;
    }
    public static function add($dto,mysqli $conn){
        $query = "insert into korisnik(ime,prezime,licna_karta) values('".$dto['ime']."','".$dto['prezime']."','".$dto['licnaKarta']."')";
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
    }
    public function update(mysqli $conn){
        $query = "update korisnik set ime='".$this->ime."', prezime='".$this->prezime."', licna_karta='".$this->licnaKarta."' where id=".$this->id;
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
    }
    public  function deleteById(mysqli $conn){
        $query = "delete from korisnik where id=".$this->id;
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
    }
}

?>