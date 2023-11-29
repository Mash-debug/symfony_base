<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ShoesRepository;
use Doctrine\ORM\EntityManager;

class ShoesController extends AbstractController
{
    #[Route('/shoes', name: 'app_shoes', methods: ["GET"])]
    public function index(ShoesRepository $shoesRepository): Response
    {   
        $shoes = $shoesRepository->findAll();

        return $this->render('shoes/index.html.twig', [
            'controller_name' => 'ShoesController',
            'shoes' => $shoes
        ]);
    }

    #[Route('/shoes/{id\<d+>}', name: 'app_shoes_show', methods: ["GET"])]
    public function showOne(ShoesRepository $shoesRepository, int $id): Response {
        $shoes = $shoesRepository->find($id);

        return $this->render('shoes/shoes.html.twig', [
            'controller_name' => 'ShoesController',
            'shoes' => $shoes
        ]);
    }

    #[Route('/shoes/{id\<d+>}', name: 'app_shoes_delete', methods: ["DELETE"])]
    public function delete(ShoesRepository $shoesRepository, EntityManager $em, int $id): Response {
        $shoes = $shoesRepository->find($id);

        if($shoes !== null) {
            $em->remove($shoes);
            $em->flush();
        } 

        return $this->render('shoes/delete.html.twig', [
            'controller_name' => 'ShoesController',
            'shoes' => $shoes
        ]);
    }

    // #[Route('/shoes', name: 'app_shoes_show', methods: ["POST"])]
    // public function create(ShoesRepository $shoesRepository): Response {

        

    //     return $this->render('shoes/index.html.twig', [
    //         'controller_name' => 'ShoesController',
    //         'shoes' => $shoes
    //     ]);
    // }


}
