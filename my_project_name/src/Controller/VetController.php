<?php

namespace App\Controller;

use App\Entity\Vet;
use App\Form\VetType;
use App\Repository\VetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vet")
 */
class VetController extends AbstractController
{
    /**
     * @Route("/", name="vet_index", methods={"GET"})
     */
    public function index(VetRepository $vetRepository): Response
    {
        return $this->render('vet/index.html.twig', [
            'vets' => $vetRepository->findAll(),
        ]);
    }

    
}
