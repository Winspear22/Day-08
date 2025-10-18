<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


//#[IsGranted(attribute: 'ROLE_USER')]
final class PostController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function defaultAction(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    #[Route('/quote', name: 'ajax_quote', methods: ['GET'])]
    public function quote(): JsonResponse
    {
        $quotes = [
            'La vie est belle.',
            'Carpe diem.',
            'Le savoir est une arme.'
        ];
        return new JsonResponse(['quote' => $quotes[array_rand($quotes)]]);
    }
}
