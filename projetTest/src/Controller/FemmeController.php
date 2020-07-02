<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FemmeController extends AbstractController
{
    /**
     * @Route("/femme", name="femme")
     */
    public function index()
    {
        return $this->render('femme/index.html.twig', [
            'controller_name' => 'FemmeController',
        ]);
    }
}
