<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Empresas;
use GfctBundle\Entity\Alumnos;
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
}

?>

