<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CguController extends AbstractController
{
    #[Route('/cgu', name: 'app_cgu')]
    public function index(): Response
    {
        return $this->render('cgu/index.html.twig', [
            'controller_name' => 'CguController',
            'title' => 'CGU',
            'breadcrumbItems' =>
                ['item1' => (object) array('name' => 'Home', 'link' => 'app_home', 'activeLink' => false),
                    'item2' => (object) array('name' => 'CGU','link' => 'app_cgu', 'activeLink' => true)]
        ]);
    }
}
