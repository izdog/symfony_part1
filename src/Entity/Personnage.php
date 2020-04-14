<?php

namespace App\Entity;

class Personnage {
    private $nom;
    private $job;
    private $sexe;
    private $stats = [];

    public static $_personnages = [];

    public function __construct(Array $data){

        $this->hydrate($data);
        self::$_personnages[] = $this;

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

    public function getJob() : String {
        return $this->job;
    }

    public function setJob(String $job) : Void {
        $this->job = $job;
    }
    
    public function getSexe() : Bool
    {
        return $this->sexe;
    }

    public function setSexe(Bool $sexe) : Void
    {
        $this->sexe = $sexe;
    }

    public function getStats() : Array
    {
        return $this->stats;
    }

    public function setStats(Array $stats) : Void
    {
        $this->stats = $stats;
    }

    public static function creerPersonnages() {
        $combattants = [
            [
                'nom' => 'marc',
                'job' => 'berserker',
                'sexe' => false,
                'stats' => [
                    'vie' => 100,
                    'force' => 10,
                    'agilite' => 4,
                    'intelligence' => 0
                ]
            ],
            [
                'nom' => 'milo',
                'job' => 'ranger',
                'sexe' => false,
                'stats' => [
                    'vie' => 100,
                    'force' => 3,
                    'agilite' => 10,
                    'intelligence' => 5
                ]
            ],
            [
                'nom' => 'tya',
                'job' => 'prêtre',
                'sexe' => true,
                'stats' => [
                    'vie' => 100,
                    'force' => 0,
                    'agilite' => 5,
                    'intelligence' => 10
                ]
            ]
        ];

        foreach($combattants as $perso){
            new Personnage($perso);
        }

    }

    public static function recupererPersoParNom(String $nom) : ?Personnage {
        foreach(self::$_personnages as $perso){
            if($perso->nom === $nom){
                return $perso;
            }
        }
        return null;
    }

}