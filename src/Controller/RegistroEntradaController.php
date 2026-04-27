<?php

namespace App\Controller;

use App\Entity\RegistroEntrada;
use App\Form\RegistroEntradaType;
use App\Repository\RegistroEntradaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/registro/entrada')]
final class RegistroEntradaController extends AbstractController
{
    /* #[IsGranted('ROLE_ADMIN')] */
    #[Route(name: 'app_registro_entrada_index', methods: ['GET'])]
    public function index(RegistroEntradaRepository $registroEntradaRepository): Response
    {
        return $this->render('registro_entrada/index.html.twig', [
            'registro_entradas' => $registroEntradaRepository->findAll(),
        ]);
    }


    #[Route('/new', name: 'app_registro_entrada_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $registroEntrada = new RegistroEntrada();
        $form = $this->createForm(RegistroEntradaType::class, $registroEntrada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($registroEntrada);
            $entityManager->flush();

            return $this->redirectToRoute('app_registro_entrada_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('registro_entrada/new.html.twig', [
            'registro_entrada' => $registroEntrada,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_registro_entrada_show', methods: ['GET'])]
    public function show(RegistroEntrada $registroEntrada): Response
    {
        return $this->render('registro_entrada/show.html.twig', [
            'registro_entrada' => $registroEntrada,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_registro_entrada_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RegistroEntrada $registroEntrada, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RegistroEntradaType::class, $registroEntrada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_registro_entrada_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('registro_entrada/edit.html.twig', [
            'registro_entrada' => $registroEntrada,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_registro_entrada_delete', methods: ['POST'])]
    public function delete(Request $request, RegistroEntrada $registroEntrada, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $registroEntrada->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($registroEntrada);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_registro_entrada_index', [], Response::HTTP_SEE_OTHER);
    }
}
