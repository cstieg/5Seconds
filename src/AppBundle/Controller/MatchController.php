<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MatchController extends Controller
{
    /**
     * @Route("/newmatch", name="new_match")
     */
    public function newMatchAction(Request $request)
    {
        return $this->render('default/newmatch.html.twig');
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
