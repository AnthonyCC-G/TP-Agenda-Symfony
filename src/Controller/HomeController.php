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
    
    #[Route('/home', name: 'app_home')]
    public function home(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();

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

}
