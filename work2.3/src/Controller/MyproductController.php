<?php

namespace App\Controller;

use App\Entity\Myproduct;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyproductController extends AbstractController
{
    /**
     * @Route("/myproduct", name="myproduct")
     */
    public function index(): Response
    {
        $rep = $this->getDoctrine()->getRepository(Myproduct::class);
        $products = $rep->findAll();
        $temp = ['prod' => $products];
        
        
        return $this->render('product/index.html.twig', $temp);
    }
}
