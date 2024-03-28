<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AddlistingController extends AbstractController
{
    #[Route('/addlisting', name: 'app_addlisting')]
    public function index(): Response
    {
        return $this->render('addlisting/index.html.twig', [
            'controller_name' => 'AddlistingController',
            'breadcrumb_title' => 'Add New Listing',
        ]);
    }
}
