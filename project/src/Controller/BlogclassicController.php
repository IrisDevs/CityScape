<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogclassicController extends AbstractController
{
    #[Route('/blogclassic', name: 'app_blogclassic')]
    public function index(): Response
    {
        return $this->render('blogclassic/index.html.twig', [
            'controller_name' => 'BlogclassicController',
            'breadcrumb_title' => 'Blog classic',
        ]);
    }
}
