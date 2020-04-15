<?php

namespace App\Entity;

class Arme {
    private $nom;
    private $description;
    private $degats;

    public static $_armes = [];

    public function __construct(Array $data){

        $this->hydrate($data);
        self::$_armes[] = $this;

    }

    private function hydrate(Array $data){

        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }

    }

    public function getNom() : String {
        return $this->nom;
    }

    public function setNom(String $nom) : Void {
        $this->nom = $nom;
    } 

    public function getDescription() : String {
        return $this->description;
    }

    public function setDescription(String $description) : Void {
        $this->description = $description;
    }
    
    public function getDegats() : Bool
    {
        return $this->degats;
    }

    public function setDegats(Bool $degats) : Void
    {
        $this->degats = $degats;
    }


    public static function creerArmes() {
        $armes = [
            [
                'nom' => 'épée',
                'description' => 'épée rouillée mais qui fait mal',
                'degats' => 10,
                
            ],
            [
                'nom' => 'hache',
                'description' => 'Hache pourfendeuse de goblin',
                'degats' => 15,
            ],
            [
                'nom' => 'arc',
                'description' => 'Arme à distance des fiotes de ranger',
                'degats' => 5,
            ]
        ];

        foreach($armes as $arme){
            new Arme($arme);
        }

    }

    public static function recupererArmeParNom(String $nom) : ?Arme {
        foreach(self::$_armes as $arme){
            if(str_replace('é','e', $arme->nom) === $nom){
                return $arme;
            }
        }
        return null;
    }

}