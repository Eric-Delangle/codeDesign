<?php

namespace App\Controller\Admin;

use App\Entity\Code;
use App\Form\CodeType;
use Cocur\Slugify\Slugify;
use App\Repository\CodeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/code")
 */
class AdminCodeController extends AbstractController
{
    /**
     * @Route("/", name="admin_code_index", methods={"GET"})
     */
    public function index(CodeRepository $codeRepository): Response
    {
        return $this->render('admin/code/index.html.twig', [
            'codes' => $codeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_code_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $code = new Code();
        $slugify = new Slugify();
        $form = $this->createForm(CodeType::class, $code);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $slug = $slugify->slugify($code->getName());
            $code->setSlug($slug);
            $code->setCreatedAt(new \DateTime());
            $code->setUpdatedAt(new \DateTime());
            $entityManager->persist($code);
            $entityManager->flush();

            return $this->redirectToRoute('admin_code_index');
        }

        return $this->render('admin/code/new.html.twig', [
            'code' => $code,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="admin_code_show", methods={"GET"})
     */
    public function show(Code $code): Response
    {
        return $this->render('code/show.html.twig', [
            'code' => $code,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="admin_code_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Code $code): Response
    {
        $form = $this->createForm(CodeType::class, $code);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('code_index');
        }

        return $this->render('admin/code/edit.html.twig', [
            'code' => $code,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_code_delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Code $code): Response
    {
        if ($this->isCsrfTokenValid('delete' . $code->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($code);
            $entityManager->flush();
        }

        return $this->redirectToRoute('code_index');
    }
}
