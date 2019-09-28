<?php

namespace App\Controller;

use App\Entity\Subsector;
use App\Entity\Localidad;
use App\Entity\Comuna;
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

        return $this->render('consulta/subsector.html.twig', [
            'subsectors' => $subsectors,
        ]);
    }
    
    /**
     * @Route("/consulta/localidad", name="consulta_localidad", methods={"GET"})
     */
    public function localidad(): Response
    {
        $localidads = $this->getDoctrine()
            ->getRepository(Localidad::class)
            ->findAll();

        return $this->render('consulta/localidad.html.twig', [
            'localidads' => $localidads,
        ]);
    }
    
    /**
     * @Route("/consulta/comuna", name="consulta_comuna", methods={"GET"})
     */
    public function comuna(): Response
    {
        $comunas = $this->getDoctrine()
            ->getRepository(Comuna::class)
            ->findAll();

        return $this->render('consulta/comuna.html.twig', [
            'comunas' => $comunas,
        ]);
    }
    
    /**
     * @Route("/consulta/ficha/comuna/{id}", name="ficha_comuna", methods={"GET"})
     */
    public function ficha_comuna(Comuna $comuna): Response
    {
        return $this->render('ficha/comuna.html.twig', [
            'comuna' => $comuna,
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
    
    /**
     * @Route("/consulta/ficha/localidad/{id}", name="ficha_localidad", methods={"GET"})
     */
    public function ficha_localidad(Localidad $localidad): Response
    {
        return $this->render('ficha/localidad.html.twig', [
            'localidad' => $localidad
        ]);
    }

}
