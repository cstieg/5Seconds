<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\SubjectModel;

class SubjectController extends Controller
{
    /**
     * @Route("/subjectmenu", name="subject_menu")
     */
    public function subjectMenuAction(Request $request)
    {
        $subjectModel = new SubjectModel($this->getDoctrine()->getEntityManager());
        $subjects = $subjectModel->GetSubjects();
        return $this->render('default/subjectmenu.html.twig', array(
            'subjects' => '$subjects',
        ));
    }    
}
