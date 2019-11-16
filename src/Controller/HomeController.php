<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HomeController extends AbstractController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

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

    /**
     * @Route("/default-language", name="default_language")
     */
    public function defaultLanguage(Request $request)
    {
        $locale = $request->query->get("language");
        $this->session->set("_locale", $locale);
        
        return $this->redirectToRoute("index");
    }
}
