<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class WebAppController extends AbstractController
{
    /**
     * @Route("/", name="web_app_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('webapp/index.html.twig');
    }

}
