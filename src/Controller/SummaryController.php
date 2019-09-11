<?php

namespace App\Controller;

use App\Entity\Subsector;
use App\Entity\Localidad;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/summary")
 */
class SummaryController extends AbstractController
{
    /**
     * @Route("/subsector/{id}", name="summary_subsector", methods={"GET"})
     */
    public function show(Subsector $subsector): Response
    {
        $localidads = $this->getDoctrine()
            ->getRepository(Localidad::class)
                ->findBy(['subsector' => $subsector->getId()], 
                        ['nombre' => 'ASC'])
//    ->findBySubsector($subsector->getId())
                ;
        
        return $this->render('summary/index.html.twig', [
            'localidads' => $localidads,
            'subsector' => $subsector,
        ]);
    }

    /**
     * @Route("/subsector/{id}/priority", name="summary_subsector_by_priority", methods={"GET"})
     */
    public function edit(Subsector $subsector): Response
    {
//            return $this->redirectToRoute('subsector_index');
        $localidads = $this->getDoctrine()
            ->getRepository(Localidad::class)
    ->findBySubsector($subsector->getId())
                ;
        
        return $this->render('summary/index1.html.twig', [
            'localidads' => $localidads,
            'subsector' => $subsector,
        ]);
    }
}
