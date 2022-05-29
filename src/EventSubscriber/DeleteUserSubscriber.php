<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpFoundation\JsonResponse;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class DeleteUserSubscriber implements EventSubscriberInterface
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['deleteUser', EventPriorities::PRE_WRITE],
        ];
    }

    public function deleteUser(ViewEvent $event)
    {
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$user instanceof User || Request::METHOD_DELETE !== $method)
            return;


        if ($user->getCustomer() !== $this->tokenStorage->getToken()->getUser())
            throw new AccessDeniedException("Vous n'avez pas l'autorisation de supprimer cet utilisateur.");
    }
}
