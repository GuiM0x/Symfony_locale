<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/", requirements={"_locale": "%app.supported_locales%"}, name="home_")
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
}
