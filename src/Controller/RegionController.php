<?php

namespace App\Controller;

use App\Entity\Region;
use App\Entity\Provincia;
use App\Entity\Comuna;
use App\Entity\Localidad;
use App\Form\RegionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/region")
 */
class RegionController extends AbstractController
{
    /**
     * @Route("/", name="region_index", methods={"GET"})
     */
    public function index(): Response
    {
        $regions = $this->getDoctrine()
            ->getRepository(Region::class)
            ->findAll();

        return $this->render('region/index.html.twig', [
            'regions' => $regions,
        ]);
    }

    /**
     * @Route("/new", name="region_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $region = new Region();
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($region);
            $entityManager->flush();

            return $this->redirectToRoute('region_index');
        }

        return $this->render('region/new.html.twig', [
            'region' => $region,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="region_show", methods={"GET"})
     */
    public function show(Region $region): Response
    {
        $provincias = $this->getDoctrine()
            ->getRepository(Provincia::class)
            ->findBy(['region' => $region]);
        
        return $this->render('region/show.html.twig', [
            'region' => $region,
            'provincias' => $provincias,
        ]);
    }
    
    /**
     * @Route("/{id}/provincia", name="region_show_provincia", methods={"GET"})
     */
    public function showProvincias(Region $region): Response
    {
        $provincias = $this->getDoctrine()
            ->getRepository(Provincia::class)
            ->findBy(['region' => $region]);

        return $this->render('provincia/index.html.twig', [
            'provincias' => $provincias,
        ]);
    }
    
    /**
     * @Route("/{id}/comuna", name="region_show_comuna", methods={"GET"})
     */
    public function showComunas(Region $region): Response
    {
        $provincias = $this->getDoctrine()
            ->getRepository(Provincia::class)
            ->findBy(['region' => $region]);
        
        $comunas = $this->getDoctrine()
            ->getRepository(Comuna::class)
            ->findBy(['provincia' => $provincias]);

        return $this->render('comuna/index.html.twig', [
            'comunas' => $comunas,
        ]);
    }
    
    /**
     * @Route("/{id}/localidad", name="region_show_localidad", methods={"GET"})
     */
    public function showLocalidadees(Region $region): Response
    {
        $provincias = $this->getDoctrine()
            ->getRepository(Provincia::class)
            ->findBy(['region' => $region]);
        
        $comunas = $this->getDoctrine()
            ->getRepository(Comuna::class)
            ->findBy(['provincia' => $provincias]);

        $localidads = $this->getDoctrine()
            ->getRepository(Localidad::class)
            ->findBy(['comuna' => $comunas]);

        return $this->render('localidad/index.html.twig', [
            'localidads' => $localidads,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="region_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Region $region): Response
    {
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('region_index');
        }

        return $this->render('region/edit.html.twig', [
            'region' => $region,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="region_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Region $region): Response
    {
        if ($this->isCsrfTokenValid('delete'.$region->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($region);
            $entityManager->flush();
        }

        return $this->redirectToRoute('region_index');
    }
}
