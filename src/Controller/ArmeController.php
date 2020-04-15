<?php

namespace App\Controller;

use App\Entity\Arme;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArmeController extends AbstractController
{
    /**
     * @Route("/arme", name="armes")
     */
    public function index()
    {
        Arme::creerArmes();
        return $this->render('arme/index.html.twig', [
            'armes' => Arme::$_armes,
        ]);
    }


    /**
     * @Route("arme/{nom}", name="display_arme")
     */
    public function show($nom){
        Arme::creerArmes();
        $arme = Arme::recupererArmeParNom($nom);
        return $this->render('arme/arme.html.twig', ['arme' => $arme]);
    }
}
