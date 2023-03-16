<?php

namespace App\Controller;

use App\Entity\Users;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class UserController extends AbstractController
{
  
    public function getUsers(ManagerRegistry $doctrine){
        // $em = $this->getDoctrine()->getManager();
        $em = $doctrine->getManager();
        $listUsers = $em->getRepository(Users::class)->findBy([], ['name'=>'ASC']);
        return $this->render('user/users.html.twig', [
            'listUsers' => $listUsers
        ]);
    }

    public function createUsers(Request $request, ManagerRegistry $doctrine){
        // $em = $this->getDoctrine()->getManager();
        $em = $doctrine->getManager();
        $users = new \App\Entity\Users();
        $form_users = $this->createForm(\App\Form\UsersType::class, $users);
        $form_users->handleRequest($request);

        if( $form_users->isSubmitted() && $form_users->isValid() ){
            $users->setStatus(1);
            $em->persist($users);
            $em->flush();

            return $this->redirectToRoute('getUsers');
        }

        return $this->render('user/user_create.html.twig', [
            'form_users' => $form_users->createView()
        ]);
    }



    public function updateUsers(Request $request, ManagerRegistry $doctrine, $id){
        $em = $doctrine->getManager();
        $users = $em->getRepository(Users::class)->find($id);
        $form_users = $this->createForm(\App\Form\UsersType::class, $users);
        $form_users->handleRequest($request);

        if( $form_users->isSubmitted() && $form_users->isValid() ){
            $em->persist($users);
            $em->flush();

        return $this->redirectToRoute('getUsers');
        }

        return $this->render('user/user_update.html.twig', [
            'form_users' => $form_users->createView()
        ]);


    }



    public function deleteUsers(ManagerRegistry $doctrine, $id){
       
        $em = $doctrine->getManager();
        $users = $em->getRepository(Users::class)->find($id);

        $users->setStatus(0);
        $em->persist($users);
        $em->flush();

        return $this->redirectToRoute('getUsers');
    }

}
