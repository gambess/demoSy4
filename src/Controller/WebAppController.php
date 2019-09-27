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
    
    /**
     * @Route("/manager", name="web_app_manager", methods={"GET"})
     */
    public function manager(): Response
    {
        
        return $this->render('webapp/manager.html.twig');
    }
    
    /**
     * @Route("/consulta", name="web_app_consulta", methods={"GET"})
     */
    public function consulta(): Response
    {
        
        return $this->render('webapp/consulta.html.twig');
    }

}
