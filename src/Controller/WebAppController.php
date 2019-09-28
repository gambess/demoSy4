<?php

namespace App\Controller;

use App\Entity\Subsector;
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
    
    /**
     * @Route("/consulta/subsector", name="consulta_subsector", methods={"GET"})
     */
    public function subsector(): Response
    {
        $subsectors = $this->getDoctrine()
            ->getRepository(Subsector::class)
            ->findAll();

        return $this->render('webapp/subsector.html.twig', [
            'subsectors' => $subsectors,
        ]);
    }
    
    /**
     * @Route("/consulta/ficha/subsector/{id}", name="ficha_subsector", methods={"GET"})
     */
    public function ficha_subsector(Subsector $subsector): Response
    {
        return $this->render('ficha/subsector.html.twig', [
            'subsector' => $subsector,
        ]);
    }

}
