<?php

namespace App\Controller;

use Stripe\Stripe;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CartController extends AbstractController
{
    #[Route('/cart/add/location/{id}', name: 'app_cart')]
    #[IsGranted('ROLE_USER')]
    public function add(SessionInterface $session, $id)
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute('app_show_cart');
    }

    #[Route('/cart/total/location/show/location', name: 'app_show_cart')]
    #[IsGranted('ROLE_USER')]
    public function show(SessionInterface $session, PropertyRepository $propertyRepository): Response
    {
        $panier = $session->get('panier', []);

        $panierWithData = [];

        foreach ($panier as $id => $quantity) {
            $panierWithData[] = [
                'product' => $propertyRepository->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;

        foreach ($panierWithData as $item) {
            $totalItem = $item['product']->getPropPrice() * $item['quantity'];
            $total += $totalItem;
        }

        return $this->render('cart/index.html.twig', [
            'items' => $panierWithData,
            'total' => $total
        ]);
    }

    #[Route('/cart/total/location/delete/location/{id}', name: 'app_delete_cart')]
    #[IsGranted('ROLE_USER')]
    public function delete(SessionInterface $session, $id)
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute('app_show_cart');
    }

    #[Route('/cart/total/location/delete/location/paiement/stype', name: 'app_payment')]
    #[IsGranted('ROLE_USER')]
    public function payment(SessionInterface $session, PropertyRepository $propertyRepository): Response
    {
        $sripeSK = $_ENV['STRIPE_SK'];
        Stripe::setApiKey($sripeSK);

        $panier = $session->get('panier', []);

        $lineItems = [];
        foreach ($panier as $id => $quantity) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $propertyRepository->find($id)->getTitle(),
                    ],
                    'unit_amount' => $propertyRepository->find($id)->getPropPrice() * 100,
                ],
                'quantity' => $quantity,
            ];
        }

        $session_paiement = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card', 'bancontact', 'ideal', 'sepa_debit'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => 'https://127.0.0.1:8000/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $this->generateUrl('user_panier_show', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'breadcrumb_title' => 'Cart',
        ]);

        return $this->redirect($session_paiement->url, 303);
    }

    #[Route('/success', name: 'app_success')]
    #[IsGranted('ROLE_USER')]
    public function success(SessionInterface $session): Response
    {
        $session->set('panier', []);

        return $this->render('cart/success.html.twig');
    }

    #[Route('/cart/total/location/delete/location/cancel_url', name: 'user_panier_show')]
    #[IsGranted('ROLE_USER')]
    public function cancel_url(): Response
    {
        return $this->render('cart/cancel_url.html.twig');
    }

}
