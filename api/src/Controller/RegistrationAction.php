<?php


namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationAction extends AbstractController
{

    public function __invoke(User $data,Request $request, UserPasswordEncoderInterface $passwordEncoder) : User
    {

//        update and create are separate
        $data->setPassword(
            $passwordEncoder->encodePassword(
                $data,
                $data->getPassword()
            )
        );


//        $entityManager = $this->getDoctrine()->getManager();
//        $entityManager->flush();

        // do anything else you need here, like send an email

        return $data;
    }
}
