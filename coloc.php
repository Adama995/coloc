<?php

class Coloc

{​​

public function __construct($nom, $prenom, $id, $age, $sexe, $adresse, $mdp)
    {
        $this->age = $age;
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setSexe($sexe);
        $this->setId($id);
        $this->setAdresse($adresse);
        $this->setMdp($mdp);
    }


public $nom;

public $prenom;

public $age;

public $id;

public $sexe;

public $score;

public $adresse;

public $mdp;

include_once "mission.php";

}

?>
