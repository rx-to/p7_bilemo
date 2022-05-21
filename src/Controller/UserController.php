<?php

namespace App\Controller;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\Response;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends AbstractController {
    #[Route('/api/users', name: 'app_users')]
    function users(ManagerRegistry $managerRegistry) {
        $repository = new UserRepository($managerRegistry);
        return $this->json($repository->findBy(['customer' => $this->getUser()->getId()]));
    }

    #[Route('/api/users/{id}', name: 'app_user')]
    function user(int $id, ManagerRegistry $managerRegistry) {
        $repository   = new UserRepository($managerRegistry);
        $user         = $repository->findBy(['id' => $id, 'customer' => $this->getUser()->getId()]);
        return $user ? $this->json($user) : new JsonResponse(['code' => 401, 'message' => "Il n'existe aucun utilisateurs possédant cet identifiant ou vous n'avez pas l'autorisation de le consulter."], 401);
    }
}