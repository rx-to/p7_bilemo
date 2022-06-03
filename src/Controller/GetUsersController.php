<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetUsersController extends AbstractController
{
    public function __invoke(ManagerRegistry $managerRegistry)
    {
        $repository = new UserRepository($managerRegistry);
        return $repository->findBy(['customer' => $this->getUser()->getId()]);
    }
}
