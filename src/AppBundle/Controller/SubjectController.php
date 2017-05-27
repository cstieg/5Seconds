<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SubjectController extends Controller
{
    /**
     * @Route("/subjectmenu", name="subject_menu")
     */
    public function subjectMenuAction(Request $request)
    {
        return $this->render('default/subjectmenu.html.twig');
    }    
}
