<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController {
    #[Route('/api/users', name: 'users')]
    function users(ManagerRegistry $managerRegistry) {
        $repository = new UserRepository($managerRegistry);
        return $this->json($repository->findBy(['customer' => $this->getUser()->getId()]));
    }
}