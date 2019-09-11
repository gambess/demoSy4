<?php

namespace App\Controller;

use App\Entity\ServicioLuz;
use App\Form\ServicioLuzType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/servicio/luz")
 */
class ServicioLuzController extends AbstractController
{
    /**
     * @Route("/", name="servicio_luz_index", methods={"GET"})
     */
    public function index(): Response
    {
        $servicioLuzs = $this->getDoctrine()
            ->getRepository(ServicioLuz::class)
            ->findAll();

        return $this->render('servicio_luz/index.html.twig', [
            'servicio_luzs' => $servicioLuzs,
        ]);
    }

    /**
     * @Route("/new", name="servicio_luz_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $servicioLuz = new ServicioLuz();
        $form = $this->createForm(ServicioLuzType::class, $servicioLuz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($servicioLuz);
            $entityManager->flush();

            return $this->redirectToRoute('servicio_luz_index');
        }

        return $this->render('servicio_luz/new.html.twig', [
            'servicio_luz' => $servicioLuz,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="servicio_luz_show", methods={"GET"})
     */
    public function show(ServicioLuz $servicioLuz): Response
    {
        return $this->render('servicio_luz/show.html.twig', [
            'servicio_luz' => $servicioLuz,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="servicio_luz_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ServicioLuz $servicioLuz): Response
    {
        $form = $this->createForm(ServicioLuzType::class, $servicioLuz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('servicio_luz_index');
        }

        return $this->render('servicio_luz/edit.html.twig', [
            'servicio_luz' => $servicioLuz,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="servicio_luz_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ServicioLuz $servicioLuz): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servicioLuz->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($servicioLuz);
            $entityManager->flush();
        }

        return $this->redirectToRoute('servicio_luz_index');
    }
}
