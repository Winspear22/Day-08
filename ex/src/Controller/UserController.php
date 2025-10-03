<?php

namespace App\Controller;

use App\Service\loginService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class UserController extends AbstractController
{

    // Affichage du formulaire login (GET)
    #[Route('/login', name: 'login_page', methods: ['GET'])]
    public function loginPage(): Response
    {
        return $this->render('user/index.html.twig');
    }

    // Traitement du login (POST AJAX)


    #[Route('/login', name: 'login_action', methods: ['POST'])]
    public function loginAction(Request $request, loginService $loginService): Response
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        if ($loginService->authenticate($username, $password) === true)
        {
            // Crée la session, etc.
            return new JsonResponse(['success' => true]);
        }
        return new JsonResponse(['error' => 'Erreur, le login est incorrecte.'], 401);
    }
}