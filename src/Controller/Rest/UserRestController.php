<?php

namespace App\Controller\Rest;

use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserRestController extends AbstractFOSRestController
{
    /**
     * @param UserRepository $userRepository
     * @return View
     *
     * @Route("/users", methods={"GET"})
     */
    public function getUsersAction(UserRepository $userRepository): View
    {
        $users = $userRepository->findAll();
        return View::create($users, Response::HTTP_OK);
    }

    /**
     * @param UserRepository $userRepository
     * @param int $id
     * @return View
     *
     * @Route("/user/{id}", methods={"GET"})
     */
    public function getUserAction(UserRepository $userRepository, int $id): View
    {
        $user = $userRepository->find($id);
        return View::create($user, Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return View
     *
     * @Route("/user", methods={"POST"})
     */
    public function postUserAction(Request $request):View
    {
        $user = new User();
        $entityManager = $this->getDoctrine()->getManager();
        $user->setUsername($request->get('username'))
            ->setPassword($request->get('password'));

        $entityManager->persist($user);
        $entityManager->flush();

        return View::create($user, Response::HTTP_CREATED);
    }
}
