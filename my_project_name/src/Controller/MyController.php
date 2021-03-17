<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PetRepository;

class MyController extends AbstractController
{

    /**
     * @Route("/my", name="my", methods={"GET"})
     */
    public function index()
    {
        return $this->render('my/index.html.twig', [
            'controller_name' => 'MyController',
        ]);
    }


    /**
     * @Route("/my", name="my_search", methods={"POST"})
     */

    public function search(Request $request)
    {

        $a = $request->request->getInt('a');
        $b = $request->request->getInt('b');

        $query = $this->getDoctrine()->getManager();
        $query = $query->createQueryBuilder();
        $query->select('node')
            ->from('App\Entity\Pet', 'node')
            ->where('node.weight = :weight')
            ->setParameter('weight', $a)
            ->andWhere('node.age = :age')
            ->setParameter('age', $b);
        $pet = $query->getQuery()->getResult();

        return $this->render('my/index.html.twig', [
            'pet' => $pet,
        ]);
    }
}
