<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{

    public function indexAction()
    {
        return $this->render('GfctBundle:Default:index.html.twig');
    }
}
