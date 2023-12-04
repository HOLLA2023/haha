<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Twilio\Rest\Client;

class EvenementController extends AbstractController
{
    private $twilio;

    public function __construct(Client $twilio)
    {
        $this->twilio = $twilio;
    }

    #[Route('/evenement', name: 'app_evenement')]
    public function index(): Response
    {
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
        ]);
    }

    #[Route('/getall', name: 'event_getall')]
    public function getall(EvenementRepository $repo): Response
    {
        $events = $repo->findAll();

        return $this->render('evenement/getall.html.twig', [
            'events' => $events,
        ]);
    }

    #[Route('/addevent', name: 'add_author')]
    public function addAuthor(ManagerRegistry $manager, Request $request, EvenementRepository $evenementRepository, SessionInterface $session): Response
    {
        $em = $manager->getManager();

        $event = new Evenement();

        $form = $this->createForm(EvenementType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vérifiez si le nombre d'événements avec le même choix_evenement dépasse 5
            $choixEvenement = $event->getChoixEvenement();
            $eventCount = $evenementRepository->countEventsByChoixEvenement($choixEvenement);

            if ($eventCount >= 5) {
                // Vous voudrez peut-être gérer cette situation, par exemple, afficher un message d'erreur.
                $error = 'Le nombre de participants pour ce choix a dépassé la limite (5).';

                return $this->renderForm('evenement/add.html.twig', ['form' => $form, 'error' => $error]);
            }

            $em->persist($event);
            $em->flush();

            $this->sendMessage();

            return $this->redirectToRoute('event_getall');
        }

        $error = "";
        return $this->renderForm('evenement/add.html.twig', ['form' => $form, 'error' => $error]);
    }

    public function sendMessage()
    {
        $message = $this->twilio->messages->create(
            '+21625288388',
            [
                'from' => '+16566664465',
                'body' => 'Bonjour de FITNATIC ! ÉVÉNEMENT réussi'
            ]
        );
    }
}
