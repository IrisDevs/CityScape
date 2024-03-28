<?php

namespace App\Controller;

use App\Entity\Form;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $contact = new Form();

        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($contact);
            $em->flush();

            // $contact = $form->getData();
            // $formName = $form->get('formName')->getData();

            // ... perform some action, such as saving the task to the database

            return new Response('Votre form a bien été prit en compte!');
        }

        return $this->renderForm('form/index.html.twig', [
            'form' => $form,
        ]);
      
    }
}
