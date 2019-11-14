<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/another-route", name="another_route")
     */
    public function anotherRoute()
    {
        return $this->render("home/another-route.html.twig");
    }
}
