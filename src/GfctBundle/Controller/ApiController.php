<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Empresas;
use GfctBundle\Entity\Alumnos;
use GfctBundle\Entity\Profesores;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class ApiController extends Controller
{
    private function serializeEmpresa(Empresas $empresa)
    {
      return array(
          'nombre' => $empresa->getNombre(),
          'direccion' => $empresa->getDireccion(),
          'cp' => $empresa->getCp(),
          'telefono1' => $empresa->getTelefono1(),
          'telefono2' => $empresa->getTelefono2(),
          'fecha' => $empresa->getFecha(),

      );
    }

    public function empresasAction()
    {
        $repository = $this->getDoctrine()->getRepository('GfctBundle:Empresas');
        $empresas = $repository->findAll();


        //var_dump($empresas);
        $data = array('empresas' => array());
        foreach ($empresas as $empresa) {
            $data['empresas'][] = $this->serializeEmpresa($empresa);
        }
        $response = new JsonResponse($data, 200);
        return $response;
        //return $this->json($empresas);
    }

    public function empresasinsertAction(Request $request)
    {
        if (
          $request->request->get('nombre')==null
          ||
          $request->request->get('direccion')==null
          ||
          $request->request->get('cp')==null
          ||
          $request->request->get('telefono1')==null
          ||
          $request->request->get('telefono2')==null
          ||
          $request->request->get('fecha')==null


          ) 
        {
          $response = new JsonResponse($this->badRequest(self::NO_ALL_ELEMENTS,""),400);
        }else{
          $empresa = new Empresas();
          $empresa->setNombre ($request->request->get('nombre'));
          $empresa->setNombre ($request->request->get('direccion'));
          $empresa->setNombre ($request->request->get('cp'));
          $empresa->setNombre ($request->request->get('telefono1'));
          $empresa->setNombre ($request->request->get('telefono2'));
          $empresa->setNombre ($request->request->get('fecha'));

          $em= $this->getDoctrine()->getManager();
          $em->persist($empresa);
          $em->$flush();

        }
    }
}

?>

