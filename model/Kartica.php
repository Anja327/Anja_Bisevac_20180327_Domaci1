<?php

class Kartica{
    private $id;
    private $brojKartice;
    private $racun;
    private $proizvodjac;
    private $korisnik;

    public function __construct($id=null, $brojKartice=null, $racun=null, $korisnik=null){
        $this->id = $id;
        $this->brojKartice = $brojKartice;
        $this->racun = $racun;
        $this->proizvodjac = $proizvodjac;
        $this->korisnik = $korisnik;
    }

    public static function getAll(mysqli $conn){
        $query = "SELECT * FROM korisnik";
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
        $data=[];
        $korisnik=$rezultat->fetch_assoc();
        while(isset($korisnik)){
            $data[]=new Korisnik($korisnik['id'],$korisnik['ime'],$korisnik['prezime'],$korisnik['licnaKarta']);
        }
        return $data;
    }
    public static function add($dto,mysqli $conn){
        $query = "insert into kartica(brojKartice,racun,proizvodjac,korisnik) values('".$dto['brojKartice']."','".$dto['racun']."',".$dto['proizvodjac'].",".$dto['korisnik'].")";
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
    }
    public function update(mysqli $conn){
        $query = "update kartica set brojKartice='".$this->brojKartice."', racun='".$this->racun."', proizvodjac=".$this->proizvodjac.", korisnik=".$this->korisnik." where id=".$this->id;
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
    }
    public  function deleteById(mysqli $conn){
        $query = "delete from kartica where id=".$this->id;
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
    }
}

?>