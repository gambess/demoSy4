<?php

namespace App\Controller;

use App\Entity\Subsector;
use App\Form\SubsectorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/subsector")
 */
class SubsectorController extends AbstractController
{
    /**
     * @Route("/", name="subsector_index", methods={"GET"})
     */
    public function index(): Response
    {
        $subsectors = $this->getDoctrine()
            ->getRepository(Subsector::class)
            ->findAll();

        return $this->render('subsector/index.html.twig', [
            'subsectors' => $subsectors,
        ]);
    }

    /**
     * @Route("/new", name="subsector_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $subsector = new Subsector();
        $form = $this->createForm(SubsectorType::class, $subsector);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($subsector);
            $entityManager->flush();

            return $this->redirectToRoute('subsector_index');
        }

        return $this->render('subsector/new.html.twig', [
            'subsector' => $subsector,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="subsector_show", methods={"GET"})
     */
    public function show(Subsector $subsector): Response
    {
        return $this->render('subsector/show.html.twig', [
            'subsector' => $subsector,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="subsector_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Subsector $subsector): Response
    {
        $form = $this->createForm(SubsectorType::class, $subsector);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subsector_index');
        }

        return $this->render('subsector/edit.html.twig', [
            'subsector' => $subsector,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="subsector_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Subsector $subsector): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subsector->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subsector);
            $entityManager->flush();
        }

        return $this->redirectToRoute('subsector_index');
    }
}
