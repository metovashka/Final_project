<?php

namespace App\Controller;

use
    Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/main", name="main_process", methods={"POST"})
     */
    public function process(Request $request)
    {
        $a = $request->request->getInt('a');

        $products = $this->getDoctrine()
            ->getRepository(Vet::class)
            ->findAllGreaterThanPrice($a);

        return $this->render('main/index.html.twig', [
            $products
        ]);
    }




}
