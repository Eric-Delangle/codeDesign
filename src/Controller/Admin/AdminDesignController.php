<?php

namespace App\Controller\Admin;

use App\Entity\Design;
use App\Form\DesignType;
use Cocur\Slugify\Slugify;
use App\Repository\DesignRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/design")
 */
class AdminDesignController extends AbstractController
{
    /**
     * @Route("/", name="admin_design_index", methods={"GET"})
     */
    public function index(DesignRepository $designRepository): Response
    {
        return $this->render('admin/design/index.html.twig', [
            'designs' => $designRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_design_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $design = new Design();
        $slugify = new Slugify();
        $form = $this->createForm(DesignType::class, $design);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $slug = $slugify->slugify($design->getName());
            $design->setSlug($slug);
            $design->setCreatedAt(new \DateTime());
            $design->setUpdatedAt(new \DateTime());
            $entityManager->persist($design);
            $entityManager->flush();

            return $this->redirectToRoute('admin_design_index');
        }

        return $this->render('admin/design/new.html.twig', [
            'design' => $design,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="admin_design_show", methods={"GET"})
     */
    public function show(Design $design): Response
    {
        return $this->render('admin/design/show.html.twig', [
            'design' => $design,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="admin_design_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Design $design): Response
    {
        $form = $this->createForm(DesignType::class, $design);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_design_index');
        }

        return $this->render('admin/design/edit.html.twig', [
            'design' => $design,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_design_delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN") 
     */
    public function delete(Request $request, Design $design): Response
    {
        if ($this->isCsrfTokenValid('delete' . $design->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($design);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_design_index');
    }
}
