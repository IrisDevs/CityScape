<?php

namespace App\Controller;

use App\Entity\Form;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{

    public function __construct(
        private MailerInterface $mailer 
    ) { }

    #[Route('/contact', name: 'app_contact')]

    
    public function new(Request $request): Response
    {
        $contact = new Form();
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new TemplatedEmail())
            ->from($form->get('email')->getData())
            ->to('toto@toto.toto')
            ->subject($form->get('subject')->getData())
            ->htmlTemplate('emails/contact.html.twig')
            ->context([
                'name' => $form->get('name')->getData(),
                'number' => $form->get('number')->getData(),
                'message' => $form->get('message')->getData(),
                'mail' => $form->get('email')->getData(),
            ]);
            ;

            $this->mailer->send($email);

            return $this->redirectToRoute('app_contact');
        }

       

        return $this->renderForm('contact/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'ContactController',
            'breadcrumb_title' => 'Contact',
        ]);
      
    }
}
