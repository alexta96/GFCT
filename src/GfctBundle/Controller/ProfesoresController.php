<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Empresas;
use GfctBundle\Entity\Profesores;
use GfctBundle\Entity\Alumnos;
use GfctBundle\Form\ProfesoresType;
use Symfony\Component\HttpFoundation\Request;


class ProfesoresController extends Controller
{
    public function allAction()
    {
    	$repository = $this->getDoctrine()->getRepository('GfctBundle:Profesores');
    	$profesores = $repository->findAll();
        return $this->render('GfctBundle:Profesores:all.html.twig', array("profesores"=>$profesores));
    }

    public function nuevoAction(Request $request)
    {
        $profesor = new Profesores();
        $form= $this->createForm(ProfesoresType::class,$profesor);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profesor = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($profesor);
            $em->flush();

            return $this->redirectToRoute('profesor_exito');
        }
        return $this->render('GfctBundle:Profesores:nuevo.html.twig', array("form"=>$form->createView()));
    }

    public function exitoAction()
    {
        return $this->render('GfctBundle:Profesores:exito.html.twig');
    }
}
