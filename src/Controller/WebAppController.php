<?php

namespace App\Controller;

use App\Entity\Subsector;
use App\Entity\Localidad;
use App\Entity\Comuna;
use App\Entity\Proyecto;
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
     * @Route("/consulta/localidad/subsector/{id}", name="consulta_localidad_by_subsector", methods={"GET"})
     */
    public function localidadBySubsector(Subsector $subsector): Response
    {
        $localidads = $this->getDoctrine()
            ->getRepository(Localidad::class)
            ->findBy(['subsector' => $subsector]);

        return $this->render('consulta/localidad.html.twig', [
            'localidads' => $localidads,
        ]);
    }
    
    /**
     * @Route("/consulta/localidad/comuna/{id}", name="consulta_localidad_by_comuna", methods={"GET"})
     */
    public function localidadByComuna(Comuna $comuna): Response
    {
        $localidads = $this->getDoctrine()
            ->getRepository(Localidad::class)
            ->findBy(['comuna' => $comuna]);

        return $this->render('consulta/localidad.html.twig', [
            'localidads' => $localidads,
        ]);
    }
    
    /**
     * @Route("/consulta/proyecto/localidad/{id}", name="consulta_proyecto_by_localidad", methods={"GET"})
     */
    public function proyectoByLocalidad(Localidad $localidad): Response
    {
        $proyectos = $this->getDoctrine()
            ->getRepository(Proyecto::class)
            ->findBy(['localidad' => $localidad]);

        return $this->render('consulta/proyecto.html.twig', [
            'proyectos' => $proyectos,
        ]);
    }
    
    /**
     * @Route("/consulta/proyecto/subsector/{id}", name="consulta_proyecto_by_subsector", methods={"GET"})
     */
    public function proyectoBySubsector(Subsector $subsector): Response
    {
        $localidads = $this->getDoctrine()
            ->getRepository(Localidad::class)
            ->findBy(['subsector' => $subsector]);
        
        $proyectos = $this->getDoctrine()
            ->getRepository(Proyecto::class)
            ->findBy(['localidad' => $localidads]);

        return $this->render('consulta/proyecto.html.twig', [
            'proyectos' => $proyectos,
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
     * @Route("/consulta/proyecto", name="consulta_proyecto", methods={"GET"})
     */
    public function proyecto(): Response
    {
        $proyectos = $this->getDoctrine()
            ->getRepository(Proyecto::class)
            ->findAll();

        return $this->render('consulta/proyecto.html.twig', [
            'proyectos' => $proyectos,
        ]);
    }
    
    /**
     * @Route("/consulta/ficha/proyecto/{id}", name="ficha_proyecto", methods={"GET"})
     */
    public function fichaProyecto(Proyecto $proyecto): Response
    {
        return $this->render('ficha/proyecto.html.twig', [
            'proyecto' => $proyecto,
        ]);
    }

    /**
     * @Route("/consulta/ficha/comuna/{id}", name="ficha_comuna", methods={"GET"})
     */
    public function fichaComuna(Comuna $comuna): Response
    {
        return $this->render('ficha/comuna.html.twig', [
            'comuna' => $comuna,
        ]);
    }
    
    /**
     * @Route("/consulta/ficha/subsector/{id}", name="ficha_subsector", methods={"GET"})
     */
    public function fichaSubsector(Subsector $subsector): Response
    {
        return $this->render('ficha/subsector.html.twig', [
            'subsector' => $subsector,
        ]);
    }
    
    /**
     * @Route("/consulta/ficha/localidad/{id}", name="ficha_localidad", methods={"GET"})
     */
    public function fichaLocalidad(Localidad $localidad): Response
    {
        return $this->render('ficha/localidad.html.twig', [
            'localidad' => $localidad
        ]);
    }

}