<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/deletesubject/{subjectID}", name="delete_subject")
     * @Method({"POST"})
     */
    public function deleteSubjectAction($subjectID)
    {
        $subjectModel = new SubjectModel($this->getDoctrine()->getManager());
        $subjectModel->deleteSubject($subjectID);   
        return new Response(Response::HTTP_OK);
    }    
    
    /**
     * @Route("/editsubject/{subject}", name="edit_subject")
     * @Method({"POST"})
     */
    public function editSubjectAction($subject, Request $request)
    {
        $subjectModel = new SubjectModel($this->getDoctrine()->getManager());
        $newSubject = $request->get('name');
        $newDescription = $request->get('description');
        $subjectModel->editSubject($subject);   
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
