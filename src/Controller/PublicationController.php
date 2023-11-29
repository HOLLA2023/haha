<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Form\PublicationType;
use App\Repository\PublicationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicationController extends AbstractController
{
    // ...

    #[Route('/addpub', name: 'add_publication')]
    public function add_publication(ManagerRegistry $manager, Request $request): Response
    {
        $em = $manager->getManager();

        $publication = new Publication();

        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($publication);
            $em->flush();

            return $this->redirectToRoute('pub_getall');
        }

        return $this->render('publication/add.html.twig', ['form' => $form->createView()]);
    }
}
