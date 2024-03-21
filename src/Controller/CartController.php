<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(SessionInterface $session, PropertyRepository $property): Response
    {

        $panier = $session->get('panier', []);

        $panierWithData =[];

        foreach ($panier as $id => $quantity){
            $panierWithData[] = [
                'product' => $property->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;

        foreach ($panierWithData as $item){
            $totalItem = $item['product']->getPrice() * $item['quantity'];
            $total += $totalItem;
        }


        return $this->render('cart/index.html.twig', [
            'items' => $panierWithData,
            'total' => $total,
            'controller_name' => 'CartController',
            'breadcrumb_title' => 'Cart',
        ]);

        
    }
}
