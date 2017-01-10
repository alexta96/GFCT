<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use GfctBundle\Form\UserType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GfctBundle:Default:index.html.twig');
    }

    
    public function registerAction(Request $request)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return new Response("Usuario Registrado");
        }

        return $this->render(
            'GfctBundle:Default:register.html.twig',
            array('form' => $form->createView())
        );
    }
}
