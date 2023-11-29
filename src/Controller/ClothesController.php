<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClothesRepository;

class ClothesController extends AbstractController
{
    #[Route('/clothes', name: 'app_clothes')]
    public function index(ClothesRepository $clothesRepository): Response
    {
        $clothes = $clothesRepository->findAll();

        return $this->render('clothes/index.html.twig', [
            'controller_name' => 'ClothesController',
            'clothes' => $clothes
        ]);
    }

}
