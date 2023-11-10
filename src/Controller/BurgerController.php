<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/burger', name: 'app_burger')]
class BurgerController extends AbstractController
{
    #[Route('/liste', name: 'app_burger_liste')]
    public function liste(): Response
    {
        return $this->render("burger/liste_burger.html.twig");
    }
}