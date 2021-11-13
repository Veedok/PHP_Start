<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(): Response
    {
        $ProductRepozitory = $this->getDoctrine()->getRepository(Product::class);
        $products = $ProductRepozitory->findAll();
        
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'products' => $products,
        ]);
    }
}
