<?php

namespace App\Controller;

use App\Entity\Provincia;
use App\Form\ProvinciaType;
use App\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/provincia")
 */
class ProvinciaController extends AbstractController
{
    /**
     * @Route("/", name="provincia_index", methods={"GET"})
     */
    public function index(): Response
    {
        $provincias = $this->getDoctrine()
            ->getRepository(Provincia::class)
            ->findAll();

        return $this->render('provincia/index.html.twig', [
            'provincias' => $provincias,
        ]);
    }

    /**
     * @Route("/new", name="provincia_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $provincium = new Provincia();
        $form = $this->createForm(ProvinciaType::class, $provincium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($provincium);
            $entityManager->flush();

            return $this->redirectToRoute('provincia_index');
        }

        return $this->render('provincia/new.html.twig', [
            'provincium' => $provincium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="provincia_show", methods={"GET"})
     */
    public function show(Provincia $provincium): Response
    {
        return $this->render('provincia/show.html.twig', [
            'provincium' => $provincium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="provincia_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Provincia $provincium): Response
    {
        $form = $this->createForm(ProvinciaType::class, $provincium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('provincia_index');
        }

        return $this->render('provincia/edit.html.twig', [
            'provincium' => $provincium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="provincia_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Provincia $provincium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$provincium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($provincium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('provincia_index');
    }
}