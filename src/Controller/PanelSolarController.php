<?php

namespace App\Controller;

use App\Entity\PanelSolar;
use App\Form\PanelSolarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panel/solar")
 */
class PanelSolarController extends AbstractController
{
    /**
     * @Route("/", name="panel_solar_index", methods={"GET"})
     */
    public function index(): Response
    {
        $panelSolars = $this->getDoctrine()
            ->getRepository(PanelSolar::class)
            ->findAll();

        return $this->render('panel_solar/index.html.twig', [
            'panel_solars' => $panelSolars,
        ]);
    }

    /**
     * @Route("/new", name="panel_solar_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $panelSolar = new PanelSolar();
        $form = $this->createForm(PanelSolarType::class, $panelSolar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($panelSolar);
            $entityManager->flush();

            return $this->redirectToRoute('panel_solar_index');
        }

        return $this->render('panel_solar/new.html.twig', [
            'panel_solar' => $panelSolar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="panel_solar_show", methods={"GET"})
     */
    public function show(PanelSolar $panelSolar): Response
    {
        return $this->render('panel_solar/show.html.twig', [
            'panel_solar' => $panelSolar,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="panel_solar_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PanelSolar $panelSolar): Response
    {
        $form = $this->createForm(PanelSolarType::class, $panelSolar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('panel_solar_index');
        }

        return $this->render('panel_solar/edit.html.twig', [
            'panel_solar' => $panelSolar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="panel_solar_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PanelSolar $panelSolar): Response
    {
        if ($this->isCsrfTokenValid('delete'.$panelSolar->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($panelSolar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('panel_solar_index');
    }
}
