<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PropertysidebarController extends AbstractController
{
    #[Route('/propertysidebar', name: 'app_propertysidebar')]
    public function index(): Response
    {
        return $this->render('propertysidebar/index.html.twig', [
            'controller_name' => 'PropertysidebarController',
            'breadcrumb_title' => 'Property sidebar',
        ]);
    }
}
