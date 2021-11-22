<?php

namespace App\Controller;

use App\Entity\Myproduct;
use App\Form\AddProductFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddProductFormController extends AbstractController
{
    /**
     * @Route("/add/product", name="add_product_form")
     */
    public function new(Request $request): Response {


        $myProd = new Myproduct();
        $form = $this->createForm(AddProductFormType::class, $myProd);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // но изначальная переменная `$task` также была обновлена
            $myProd = $form->getData();

            // ... выполните какое-то действие, например сохраните задачу в базу данных
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($myProd);
            $entityManager->flush();

            
        }

        return $this->render('add_product_form/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
