<?php

namespace App\Controller;

use App\Entity\Comuna;
use App\Form\ComunaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comuna")
 */
class ComunaController extends AbstractController
{
    /**
     * @Route("/", name="comuna_index", methods={"GET"})
     */
    public function index(): Response
    {
        $comunas = $this->getDoctrine()
            ->getRepository(Comuna::class)
            ->findAll();

        return $this->render('comuna/index.html.twig', [
            'comunas' => $comunas,
        ]);
    }

    /**
     * @Route("/new", name="comuna_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $comuna = new Comuna();
        $form = $this->createForm(ComunaType::class, $comuna);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comuna);
            $entityManager->flush();

            return $this->redirectToRoute('comuna_index');
        }

        return $this->render('comuna/new.html.twig', [
            'comuna' => $comuna,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comuna_show", methods={"GET"})
     */
    public function show(Comuna $comuna): Response
    {
        return $this->render('comuna/show.html.twig', [
            'comuna' => $comuna,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="comuna_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Comuna $comuna): Response
    {
        $form = $this->createForm(ComunaType::class, $comuna);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comuna_index');
        }

        return $this->render('comuna/edit.html.twig', [
            'comuna' => $comuna,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comuna_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Comuna $comuna): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comuna->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comuna);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comuna_index');
    }
}
