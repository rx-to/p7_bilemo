<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetUserController extends AbstractController
{
    public function __invoke(int $id, ManagerRegistry $managerRegistry)
    {
        $repository = new UserRepository($managerRegistry);
        $data = $repository->find($id);

        if ($data->getCustomer()->getId() !== $this->getUser()->getId())
            return $this->json(['code' => 401, 'message' => "Vous n'avez pas l'autorisation de consulter cet utilisateur."]);

        return $data;
    }
}
