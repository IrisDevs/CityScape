<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PropertydetailController extends AbstractController
{
    #[Route('/property/property.slug', name: 'app_propertydetail')]
    public function index(Property $property): Response
    {
        dd($property);
        return $this->render('propertydetail/index.html.twig', [
            'controller_name' => 'PropertydetailController',
            'breadcrumb_title' => 'Property details',
        ]);
    }
}
