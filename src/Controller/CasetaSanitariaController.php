<?php

namespace App\Controller;

use App\Entity\CasetaSanitaria;
use App\Form\CasetaSanitariaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/caseta/sanitaria")
 */
class CasetaSanitariaController extends AbstractController
{
    /**
     * @Route("/", name="caseta_sanitaria_index", methods={"GET"})
     */
    public function index(): Response
    {
        $casetaSanitarias = $this->getDoctrine()
            ->getRepository(CasetaSanitaria::class)
            ->findAll();

        return $this->render('caseta_sanitaria/index.html.twig', [
            'caseta_sanitarias' => $casetaSanitarias,
        ]);
    }

    /**
     * @Route("/new", name="caseta_sanitaria_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $casetaSanitarium = new CasetaSanitaria();
        $form = $this->createForm(CasetaSanitariaType::class, $casetaSanitarium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($casetaSanitarium);
            $entityManager->flush();

            return $this->redirectToRoute('caseta_sanitaria_index');
        }

        return $this->render('caseta_sanitaria/new.html.twig', [
            'caseta_sanitarium' => $casetaSanitarium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="caseta_sanitaria_show", methods={"GET"})
     */
    public function show(CasetaSanitaria $casetaSanitarium): Response
    {
        return $this->render('caseta_sanitaria/show.html.twig', [
            'caseta_sanitarium' => $casetaSanitarium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="caseta_sanitaria_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CasetaSanitaria $casetaSanitarium): Response
    {
        $form = $this->createForm(CasetaSanitariaType::class, $casetaSanitarium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('caseta_sanitaria_index');
        }

        return $this->render('caseta_sanitaria/edit.html.twig', [
            'caseta_sanitarium' => $casetaSanitarium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="caseta_sanitaria_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CasetaSanitaria $casetaSanitarium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$casetaSanitarium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($casetaSanitarium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('caseta_sanitaria_index');
    }
}
