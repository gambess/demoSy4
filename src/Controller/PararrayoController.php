<?php

namespace App\Controller;

use App\Entity\Pararrayo;
use App\Form\PararrayoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pararrayo")
 */
class PararrayoController extends AbstractController
{
    /**
     * @Route("/", name="pararrayo_index", methods={"GET"})
     */
    public function index(): Response
    {
        $pararrayos = $this->getDoctrine()
            ->getRepository(Pararrayo::class)
            ->findAll();

        return $this->render('pararrayo/index.html.twig', [
            'pararrayos' => $pararrayos,
        ]);
    }

    /**
     * @Route("/new", name="pararrayo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pararrayo = new Pararrayo();
        $form = $this->createForm(PararrayoType::class, $pararrayo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pararrayo);
            $entityManager->flush();

            return $this->redirectToRoute('pararrayo_index');
        }

        return $this->render('pararrayo/new.html.twig', [
            'pararrayo' => $pararrayo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pararrayo_show", methods={"GET"})
     */
    public function show(Pararrayo $pararrayo): Response
    {
        return $this->render('pararrayo/show.html.twig', [
            'pararrayo' => $pararrayo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pararrayo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pararrayo $pararrayo): Response
    {
        $form = $this->createForm(PararrayoType::class, $pararrayo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pararrayo_index');
        }

        return $this->render('pararrayo/edit.html.twig', [
            'pararrayo' => $pararrayo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pararrayo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pararrayo $pararrayo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pararrayo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pararrayo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pararrayo_index');
    }
}
