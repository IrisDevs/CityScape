<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjectdetailController extends AbstractController
{
    #[Route('/projectdetail', name: 'app_projectdetail')]
    public function index(): Response
    {
        return $this->render('projectdetail/index.html.twig', [
            'controller_name' => 'ProjectdetailController',
            'breadcrumb_title' => 'Project Detail',
        ]);
    }
}
