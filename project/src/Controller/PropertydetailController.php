<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PropertydetailController extends AbstractController
{
    #[Route('/property/detail/{slug}', name: 'app_propertydetail', priority: 1)]
    public function index(Property $property): Response
    {
        return $this->render('propertydetail/index.html.twig', [
            'property' => $property,
            'breadcrumb_title' => 'Property Detail',
        ]);
    }
}
