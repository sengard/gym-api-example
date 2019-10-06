<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Plan;
use App\Entity\User;
use App\Entity\Workout;
use App\Model\HasOwner;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AddPlanAndWorkoutForUserSubscriber
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['action', EventPriorities::POST_WRITE],
        ];
    }

    public function action(ViewEvent $event)
    {
        $article = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($article instanceof User || Request::METHOD_POST == $method) {
            $this->createPlanAndWorkout($article);
        }

    }

    private function createPlanAndWorkout(User $user)
    {
        $plan = new Plan();
        $plan->setName('test paln');
        $plan->setDescription('plan to make you look buff!');
        $plan->setUser($user);
        $workout = new Workout();
    }
}
