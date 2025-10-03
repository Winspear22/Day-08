<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class UserController extends AbstractController
{
    #[Route('/login', name: 'login_action', methods: ['POST'])]
    public function loginAction(Request $request): Response
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        // Cas où il manque un champ !
        if (!$username || !$password)
        {
            return new JsonResponse(
                ['error' => 'Champs manquant'],
                400 // Bad Request
            );
        }

        // Ici tu mets ta vraie logique de login plus tard (user/pass test)
        // Pour l’instant, juste un message
        return new JsonResponse([
            'message' => "Bienvenue $username !"
        ]);
    }
}