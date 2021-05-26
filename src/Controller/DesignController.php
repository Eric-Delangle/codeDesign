<?php

namespace App\Controller;

use App\Entity\Design;
use App\Repository\DesignRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/design")
 */
class DesignController extends AbstractController
{
    /**
     * @Route("/", name="design_index", methods={"GET"})
     */
    public function index(DesignRepository $designRepository): Response
    {
        return $this->render('design/index.html.twig', [
            'designs' => $designRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{slug}", name="design_show", methods={"GET"})
     */
    public function show(Design $design): Response
    {
        return $this->render('design/show.html.twig', [
            'design' => $design,
        ]);
    }
}
