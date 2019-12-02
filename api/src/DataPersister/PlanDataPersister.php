<?php


namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Plan;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;


class PlanDataPersister implements ContextAwareDataPersisterInterface
{

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param TokenStorageInterface $tokenStorage
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager)
    {
        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
    }


    public function supports($data, array $context = []): bool
    {
        return $data instanceof Plan;
    }

    public function persist($data, array $context = [])
    {
//        $user = $this->tokenStorage->getToken()->getUser();
        /** @var Plan $data */
        $user = $data->getUser();
        $plans = $this->entityManager->getRepository(Plan::class)->findBy(['user'=>$user->getId()]);

        if (!$user instanceof UserInterface) {
            return $data;
        }

        /** @var Plan $plan */
        foreach($plans as $plan){
            $plan->setIsCurrent(false);
            $this->entityManager->persist($plan);
        }

        $data->setIsCurrent(true);
        // call your persistence layer to save $data
        $this->entityManager->persist($data);
        $this->entityManager->flush();
        return $data;
    }

    public function remove($data, array $context = [])
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }
}
