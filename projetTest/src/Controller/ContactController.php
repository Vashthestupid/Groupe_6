<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_mailer $mailer):Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($contact);

            $entityManager->flush();

            $prenom = $contact->getPrenomContact();
            $nom = $contact->getNomContact();
            $sujet = $contact->getSujet();
            $email = $contact->getEmail();
            $contenu = $contact->getContenuMessage();

            $textBody = "<h3>".$email."</h3><p>Le sujet : ".$sujet."</p><p>Votre message</p><p>".$contenu."</p><p>Votre adresse e-mail : $email </p><p>De la part de ".$prenom. " " .$nom;


            $message = (new \Swift_Message($sujet))
                ->setFrom($email)
                ->setTo('loic.tauveron62@gmail.com')
                ->setBody($textBody, 'text/html', 'utf-8');

            $mailer->send($message);

            return $this->redirectToRoute('home');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()
        ]);
    }
}
