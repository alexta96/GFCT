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

    //Funcion "serialize" que cogerá los campos de la BD
    private function serializeProfesor(Profesores $profesor)
    {
      return array(
          'nombre' => $profesor->getNombre(),
          'apellidos' => $profesor->getApellidos(),
          'departamento' => $profesor->getDepartamento(),

      );
    }

    //Funcion profesores que mostrará los datos de los profesores tranformandolo en formato JSON 
    public function profesoresAction()
    {
        $repository = $this->getDoctrine()->getRepository('GfctBundle:Profesores');
        $profesores = $repository->findAll();


        //var_dump($profesores);
        $data = array('profesores' => array());
        foreach ($profesores as $profesor) {
            $data['profesores'][] = $this->serializeProfesor($profesor);
        }
        $response = new JsonResponse($data, 200);
        return $response;
        //return $this->json($profesores);
    }
}

?>

