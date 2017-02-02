<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\User;
use GfctBundle\Entity\conf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;;
use GfctBundle\Form\confType;

class ConfiguracionController extends Controller
{

    public function nuevoconfAction(Request $request)
    {
        $configuracion = new conf();
        $form= $this->createForm(confType::class,$configuracion);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $empresa = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($configuracion);
            $em->flush();

            return $this->redirectToRoute('empresa_exito');
        }
        return $this->render('GfctBundle:Configuracion:nuevo.html.twig', array("form"=>$form->createView()));
    }

    public function allconfAction()
    {
        $repository = $this->getDoctrine()->getRepository('GfctBundle:conf');
        $configuraciones = $repository->findAll();
        return $this->render('GfctBundle:Configuracion:all.html.twig', array("configuraciones"=>$configuraciones));
    }

    public function msgExitoAction()
    {
        $repository = $this->getDoctrine()->getRepository('GfctBundle:conf');
        $config = $repository->findAll();
        return $this->render('GfctBundle:Configuracion:exito.html.twig',array('config'=>$config));
    }
}
