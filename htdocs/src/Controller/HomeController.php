<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function index() : Response{
        //return new Response('<html><body>Home Page Symfony</body></html>');
        return $this-> render("home.html.twig");
    }
}