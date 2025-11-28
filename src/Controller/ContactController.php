<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact/ajouter', name: 'app_contact_ajouter')]
    public function ajouter(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();
            
            $this->addFlash('success', 'Contact ajouté avec succès');
            
            return $this->redirectToRoute('app_home');
        }
        
        return $this->render('contact/ajouter.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/contact/modifier/{id}', name: 'app_contact_modifier')]
    public function modifier(Contact $contact, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
        
            $this->addFlash('success', 'Contact modifié avec succès');
        
        return $this->redirectToRoute('app_home');
        }
    
        return $this->render('contact/modifier.html.twig', [
            'form' => $form->createView(),
            'contact' => $contact
        ]);
    }

}