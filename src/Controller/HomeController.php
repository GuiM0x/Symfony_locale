<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/", requirements={"_locale": "%app.supported_locales%"})
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/{_locale}", name="index")
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
