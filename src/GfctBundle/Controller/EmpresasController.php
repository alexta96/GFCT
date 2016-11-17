<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Empresas;
use GfctBundle\Form\EmpresasType;
use Symfony\Component\HttpFoundation\Request;


class EmpresasController extends Controller
{
    public function allAction()
    {
    	$repository = $this->getDoctrine()->getRepository('GfctBundle:Empresas');
    	$companies = $repository->findAll();
        return $this->render('GfctBundle:Empresas:all.html.twig', array("empresas"=>$companies));
    }

    public function nuevoAction(Request $request)
    {
    	$empresa = new Empresas();
    	$form= $this->createForm(EmpresasType::class,$empresa);

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
    		$empresa = $form->getData();
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($empresa);
    		$em->flush();

    		return $this->redirectToRoute('empresa_exito');
    	}
    	return $this->render('GfctBundle:Empresas:nuevo.html.twig', array("form"=>$form->createView()));
    }

    /*public function nuevoEmpAlAction()
    {
        $alumnos=new Alumnos();
        $alumnos->gt;setNombre("Paco");
 
        //Nuevo evento para esa categoria
        $empresa = new Empresas();
        $empresa->gt;setNombreEvento("Cabalgata");
        $empresa->gt;setCiudad("Torrent");
        $empresa->gt;setPoblacion("Valencia");
        $empresa->gt;setFecha(new \DateTime());
 
        //Ligar la categoria a nuestro evento
        $empresa->gt;setCategoria($categoria);
 
        //Guardar en la BD
        $em = $this->gt;getDoctrine()->gt;getManager();
        $em->gt;persist($categoria);
        $em->gt;persist($evento);
        $em->gt;flush();
    }*/

    public function exitoAction()
    {
        return $this->render('GfctBundle:Empresas:exito.html.twig');
    }
}
