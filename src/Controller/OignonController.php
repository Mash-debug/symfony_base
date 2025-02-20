<?php

namespace App\Controller;

use App\Repository\OignonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OignonController extends AbstractController
{
    #[Route('/oignon', name: 'app_oignon')]
    public function index(OignonRepository $oignonRepository): Response
    {
        $oignons = $oignonRepository->findAll();
        return $this->render('oignon/index.html.twig', [
            'controller_name' => 'OignonController',
            'oignons' => $oignons
        ]);
    }
}
