<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogdetailController extends AbstractController
{
    #[Route('/blogdetail', name: 'app_blogdetail')]
    public function index(): Response
    {
        return $this->render('blogdetail/index.html.twig', [
            'controller_name' => 'BlogdetailController',
            'breadcrumb_title' => 'Blog detail',
        ]);
    }
}
