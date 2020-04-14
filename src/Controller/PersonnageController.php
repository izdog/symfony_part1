<?php

namespace App\Controller;

use App\Entity\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{

    /**
     * @Route("/", name="personnages")
     */
    public function index()
    {
        Personnage::creerPersonnages();

        $personnages = Personnage::$_personnages;

        return $this->render('personnage/index.html.twig', ['personnages' => $personnages]);
    }

    /**
     * @Route("/personnage/{nom}", name="display_perso")
     */
    public function show($nom){

        Personnage::creerPersonnages();
        $perso = Personnage::recupererPersoParNom($nom);
        
        return $this->render('personnage/personnage.html.twig', ['perso' => $perso]);

    }

}
