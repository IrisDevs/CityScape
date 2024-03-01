<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PropertydetailController extends AbstractController
{
    #[Route('/propertydetail', name: 'app_propertydetail')]
    public function index(): Response
    {
        return $this->render('propertydetail/index.html.twig', [
            'controller_name' => 'PropertydetailController',
            'breadcrumb_title' => 'Property details',
        ]);
    }
}
