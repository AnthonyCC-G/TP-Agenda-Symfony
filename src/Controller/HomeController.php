<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ContactRepository;


final class HomeController extends AbstractController
{
    // #[Route('/home', name: 'app_home')]
    // public function index(): Response
    // {
    //     return $this->render('base.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }



    // #[Route('/home', name: 'app_home')]
    // public function home(): Response
    // {
    //     return $this->render('home/home.html.twig', [
    //         'controller_name' => 'HomeController'
    //     ]);
    // }

    // #[Route('/contact', name: 'app_contact')]
    // public function contact(): Response
    // {
    //     return $this->render('contact.html.twig', [
    //         'controller_name' => 'HomeController'
    //     ]);
    // }

    // #[Route('/test-insert', name: 'test_insert')]
    // public function testInsert(EntityManagerInterface $entityManager): Response
    // {
    //     $contact = new Contact();
    //     $contact->setNom('Le Barbare');
    //     $contact->setPrenom('Connan');
    //     $contact->setTelephone('0114776688');
    //     $contact->setAdresse('avenue des vilains musclés');
    //     $contact->setVille('GoMuscu');
    //     $contact->setAge(25);

    //     $entityManager->persist($contact);

    //     $entityManager->flush();

    //     return new Response('Contact enregistré !');
    // }
    
    
    // #[Route('/test-add-contacts', name: 'test_add_contacts')]
    // public function testAddContacts(EntityManagerInterface $entityManager): Response
    // {
    // // Contact mineur (moins de 18 ans)
    // $contact1 = new Contact();
    // $contact1->setNom('Jeune');
    // $contact1->setPrenom('Paul');
    // $contact1->setTelephone('0601020304');
    // $contact1->setAdresse('1 rue des Ados');
    // $contact1->setVille('Lille');
    // $contact1->setAge(16); // Mineur !
    
    // // Contact majeur (plus de 18 ans)
    // $contact2 = new Contact();
    // $contact2->setNom('Adulte');
    // $contact2->setPrenom('Marie');
    // $contact2->setTelephone('0605060708');
    // $contact2->setAdresse('2 rue des Grands');
    // $contact2->setVille('Paris');
    // $contact2->setAge(25); // Majeur
    
    // $entityManager->persist($contact1);
    // $entityManager->persist($contact2);
    // $entityManager->flush();
    
    // return new Response('2 contacts ajoutés : 1 mineur (16 ans) et 1 majeur (25 ans) !');
    // }


    #[Route('/home', name: 'app_home')]
    public function home(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAdults();

        return $this->render('home/home.html.twig', [
            'contacts' => $contacts
        ]);
    }

    #[Route('/contact/{id}', name: 'app_contact')]
    public function contact(Contact $contact): Response
    {
        return $this->render('contact.html.twig', [
            'contact' => $contact
        ]);
    }


    #[Route('/modifier/{id}', name: 'app_modifier')]
    public function modifier(Contact $contact, EntityManagerInterface $entityManager): Response
    {
    
    $contact->setTelephone('New number!');
    
    
    $entityManager->flush();
    
    
    return $this->redirectToRoute('app_home');
    
    }

    #[Route('/supprimer/{id}', name: 'app_supprimer')]
    public function supprimer(Contact $contact, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($contact);
    
        $entityManager->flush();
    
        return $this->redirectToRoute('app_home');
    }



}
