<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Empresas;
use GfctBundle\Entity\Alumnos;
use Symfony\Component\HttpFoundation\Request;


class AlumnosController extends Controller
{
    public function allAction()
    {
    	$repository = $this->getDoctrine()->getRepository('GfctBundle:Alumnos');
    	$alumnos = $repository->findAll();
        return $this->render('GfctBundle:Alumnos:all.html.twig', array("alumnos"=>$alumnos));
    }
}
