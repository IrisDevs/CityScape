<?php

namespace App\Controller\Menu;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MenuController extends AbstractController
{
    public function menu(CategoryRepository $category): Response    
    {
        return $this->render('_partials/_header_top.html.twig',['categories' => $category->findBy(['parent' => null])]);
    }
}
