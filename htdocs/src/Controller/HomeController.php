<?php

namespace App\Controller;


use App\Entity\Customer;
use App\Entity\Product;
use App\Entity\Test;
use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function index(TestRepository $testRepository) : Response{
        /*$entity_manager = $this->getDoctrine()->getManager();

        $test = new Customer();
        $test->setName("John");
        $test->setAge('20');

        $test1 = new Customer();
        $test1->setName("Does");
        $test1->setAge('72');

        $entity_manager->persist($test);
        $entity_manager->persist($test1);
        $entity_manager->flush();*/

        $productRepository = $this->getDoctrine()->getRepository(Customer::class);
        $test = $productRepository->findAll();
        return $this-> render("home.html.twig");
    }
}