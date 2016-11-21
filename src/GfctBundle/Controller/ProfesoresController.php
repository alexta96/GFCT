<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Empresas;
use GfctBundle\Entity\Profesores;
use GfctBundle\Entity\Alumnos;
use GfctBundle\Form\ProfesoresType;
use Symfony\Component\HttpFoundation\Request;


class ProfesoresController extends Controller

//Funcion all que mostrará la tabla Profesores
{
    public function allAction()
    {
    	$repository = $this->getDoctrine()->getRepository('GfctBundle:Profesores');
    	$profesores = $repository->findAll();
        return $this->render('GfctBundle:Profesores:all.html.twig', array("profesores"=>$profesores));
    }

//Funcion "nuevo" que cargará el formulario e insertará el profesor en la BD
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

//Funcion "exito" que mostrará un mensaje de inserción cuando el profesor haya sido insertado
    public function exitoAction()
    {
        return $this->render('GfctBundle:Profesores:exito.html.twig');
    }
}
