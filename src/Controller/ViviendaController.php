<?php

namespace App\Controller;

use App\Entity\Vivienda;
use App\Form\ViviendaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vivienda")
 */
class ViviendaController extends AbstractController
{
    /**
     * @Route("/", name="vivienda_index", methods={"GET"})
     */
    public function index(): Response
    {
        $viviendas = $this->getDoctrine()
            ->getRepository(Vivienda::class)
            ->findAll();

        return $this->render('vivienda/index.html.twig', [
            'viviendas' => $viviendas,
        ]);
    }

    /**
     * @Route("/new", name="vivienda_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vivienda = new Vivienda();
        $form = $this->createForm(ViviendaType::class, $vivienda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vivienda);
            $entityManager->flush();

            return $this->redirectToRoute('vivienda_index');
        }

        return $this->render('vivienda/new.html.twig', [
            'vivienda' => $vivienda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vivienda_show", methods={"GET"})
     */
    public function show(Vivienda $vivienda): Response
    {
        return $this->render('vivienda/show.html.twig', [
            'vivienda' => $vivienda,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vivienda_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vivienda $vivienda): Response
    {
        $form = $this->createForm(ViviendaType::class, $vivienda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vivienda_index');
        }

        return $this->render('vivienda/edit.html.twig', [
            'vivienda' => $vivienda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vivienda_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vivienda $vivienda): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vivienda->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vivienda);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vivienda_index');
    }
}
