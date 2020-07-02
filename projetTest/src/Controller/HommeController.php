<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HommeController extends AbstractController
{
    /**
     * @Route("/homme", name="homme")
     */
    public function index()
    {
        return $this->render('homme/index.html.twig', [
            'controller_name' => 'HommeController',
        ]);
    }
}
