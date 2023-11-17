<?php

namespace App\Controller;

use App\Entity\Sauce;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SauceType;



class SauceController extends AbstractController
{
    #[Route('/sauce', name: 'app_sauce')]
    public function index(): Response
    {
        return $this->render('sauce/index.html.twig', [
            'controller_name' => 'SauceController',
        ]);
    }

    #[Route('/sauce/create', name: 'creation', methods: ['GET', 'POST'])]
    public function creation(Request $request, EntityManagerInterface $em): Response
    {
        $sauce = new Sauce();
        $form = $this->createForm(SauceType::class, $sauce);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($sauce);
            $em->flush();
    
            $this->addFlash('success', 'Sauce créé!');
            return $this->redirectToRoute('app_sauce');
        }
    
        return $this->render('sauce/ajout_sauce.html.twig', [
            'sauce' => $sauce,
            'form' => $form->createView()
        ]);
    }
}
