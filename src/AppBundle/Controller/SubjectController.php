<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\SubjectModel;

class SubjectController extends Controller
{
        
    /**
     * @Route("/addsubject", name="add_subject")
     * @Method({"POST"})
     */
    public function addSubjectAction(Request $request)
    {
        $subjectModel = new SubjectModel($this->getDoctrine()->getManager());
        $name = $request->get('name');
        $description = $request->get('description');
        $subjectModel->addSubject($name, $description);   
        return $this->redirectToRoute('subject_menu', array(), 301);
    }    
    
    
    /**
     * @Route("/deletesubject/{subject}", name="delete_subject")
     * @Method({"POST"})
     */
    public function deleteSubjectAction($subject)
    {
        $subjectModel = new SubjectModel($this->getDoctrine()->getManager());
        $subjectModel->deleteSubject($subject);   
        return $this->redirectToRoute('subject_menu', array(), 301);
    }    
    
    
    /**
     * @Route("/subjectmenu", name="subject_menu")
     * @Method({"GET"})
     */
    public function subjectMenuAction()
    {
        $subjectModel = new SubjectModel($this->getDoctrine()->getManager());
        $subjects = $subjectModel->GetSubjects();
        return $this->render('default/subjectmenu.html.twig', ['subjects' => $subjects,]);
    }

}
