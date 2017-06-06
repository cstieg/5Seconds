<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Model\MatchModel;
use AppBundle\Model\SubjectModel;
use AppBundle\Model\UserModel;

class MatchController extends Controller
{
    /**
     * @Route("/newmatch", name="new_match")
     */
    public function newMatchAction(Request $request)
    {
        if ($request->isMethod('GET'))
        {
            $subjectModel = new SubjectModel($this->getDoctrine()->getManager());
            $subjects = $subjectModel->GetSubjects();
            return $this->render('default/newmatch.html.twig', ['subjects' => $subjects,]);            
        }
        else if ($request->isMethod('POST')) {
            $matchModel = new MatchModel($this->getDoctrine()->getManager());
            $userModel = new UserModel($this->getDoctrine()->getManager());
            $name = $request->get('name');
            $subjects = $request->get('subjectlist');
            $matchModel->addMatch($name, $this->getUser(), $subjects);
            return new Response(Response::HTTP_OK);
        }
    }

    /**
     * @Route("/joinmatch", name="join_match")
     */
    public function joinMatchAction(Request $request)
    {
        return $this->render('default/joinmatch.html.twig');
    }

    /**
     * @Route("/editmatch", name="edit_match")
     */
    public function editMatchAction(Request $request)
    {
        return $this->render('default/editmatch.html.twig');
    }
    
}
