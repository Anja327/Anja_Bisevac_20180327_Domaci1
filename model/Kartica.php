<?php

class Kartica{
    private $id;
    private $brojKartice;
    private $racun;
    private $proizvodjac;
    private $korisnik;

    public function __construct($id=null, $brojKartice=null, $racun=null, $korisnik=null,$proizvodjac=null){
        $this->id = $id;
        $this->brojKartice = $brojKartice;
        $this->racun = $racun;
        $this->proizvodjac = $proizvodjac;
        $this->korisnik = $korisnik;
    }

    public static function getAll(mysqli $conn){
        $query = "select k.*, p.naziv as 'naziv_proizvodjaca', CONCAT(ko.ime,' ',ko.prezime) as 'naziv_korisnika' FROM kartica k inner join proizvodjac p on (p.id = k.proizvodjac) inner join korisnik ko on (ko.id= k.korisnik)";
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
        $data=[];
        
        while($kartica=$rezultat->fetch_assoc()){
            $data[]= $kartica;
        }
        return $data;
    }
    public static function add($dto,mysqli $conn){
        $query = "insert into kartica(broj_kartice,racun,proizvodjac,korisnik) values('".$dto['brojKartice']."','".$dto['racun']."',".$dto['proizvodjac'].",".$dto['korisnik'].")";
        $rezultat = $conn->query($query);
        if(!$rezultat){
            throw new  Exception($conn->error);
        }
    }
    public function update(mysqli $conn){
        $query = "update kartica set broj_kartice='".$this->brojKartice."', racun='".$this->racun."', proizvodjac=".$this->proizvodjac.", korisnik=".$this->korisnik." where id=".$this->id;
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