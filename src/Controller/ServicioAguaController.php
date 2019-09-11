<?php

namespace App\Controller;

use App\Entity\ServicioAgua;
use App\Form\ServicioAguaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/servicio/agua")
 */
class ServicioAguaController extends AbstractController
{
    /**
     * @Route("/", name="servicio_agua_index", methods={"GET"})
     */
    public function index(): Response
    {
        $servicioAguas = $this->getDoctrine()
            ->getRepository(ServicioAgua::class)
            ->findAll();

        return $this->render('servicio_agua/index.html.twig', [
            'servicio_aguas' => $servicioAguas,
        ]);
    }

    /**
     * @Route("/new", name="servicio_agua_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $servicioAgua = new ServicioAgua();
        $form = $this->createForm(ServicioAguaType::class, $servicioAgua);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($servicioAgua);
            $entityManager->flush();

            return $this->redirectToRoute('servicio_agua_index');
        }

        return $this->render('servicio_agua/new.html.twig', [
            'servicio_agua' => $servicioAgua,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="servicio_agua_show", methods={"GET"})
     */
    public function show(ServicioAgua $servicioAgua): Response
    {
        return $this->render('servicio_agua/show.html.twig', [
            'servicio_agua' => $servicioAgua,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="servicio_agua_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ServicioAgua $servicioAgua): Response
    {
        $form = $this->createForm(ServicioAguaType::class, $servicioAgua);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('servicio_agua_index');
        }

        return $this->render('servicio_agua/edit.html.twig', [
            'servicio_agua' => $servicioAgua,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="servicio_agua_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ServicioAgua $servicioAgua): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servicioAgua->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($servicioAgua);
            $entityManager->flush();
        }

        return $this->redirectToRoute('servicio_agua_index');
    }
}
