<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Model\TriviaCategoryModel;

class TriviaCategoryController extends Controller
{
        
    /**
     * @Route("/addtriviacategory", name="add_trivia_category")
     * @Method({"POST"})
     */
    public function addTriviaCategoryAction(Request $request)
    {
        $triviaCategoryModel = new TriviaCategoryModel($this->getDoctrine()->getManager());
        $name = $request->get('name');
        $description = $request->get('description');
        $triviaCategoryModel->addTriviaCategory($name, $description);   
        return $this->redirectToRoute('trivia_category_menu', array(), 301);
    }    
    
    
    /**
     * @Route("/deletetriviacategory/{triviaCategoryID}", name="delete_trivia_category")
     * @Method({"POST"})
     */
    public function deleteTriviaCategoryAction($triviaCategoryID)
    {
        $triviaCategoryModel = new TriviaCategoryModel($this->getDoctrine()->getManager());
        $triviaCategoryModel->deleteTriviaCategory($triviaCategoryID);   
        return new Response(Response::HTTP_OK);
    }    
    
    /**
     * @Route("/edittriviacategory/{triviaCategoryID}", name="edit_trivia_category")
     * @Method({"POST", "GET"})
     */
    public function editTriviaCategoryAction($triviaCategoryID, Request $request)
    {
        $triviaCategoryModel = new TriviaCategoryModel($this->getDoctrine()->getManager());
        if ($request->isMethod('GET'))
        {
            $triviaCategory = $triviaCategoryModel->getTriviaCategory($triviaCategoryID);
            return $this->render('default/edittriviacategory.html.twig', ['triviaCategory' => $triviaCategory,]);            
        }
        else if ($request->isMethod('POST')) {        
            $newName = $request->get('name');
            $newDescription = $request->get('description');
            $triviaCategoryModel->editSubject($triviaCategoryID, $newName, $newDescription);   
            return new Response(Response::HTTP_OK);
        }
    }    
    
    
    /**
     * @Route("/triviacategorymenu", name="trivia_category_menu")
     * @Method({"GET"})
     */
    public function triviaCategoryMenuAction()
    {
        $triviaCategoryModel = new TriviaCategoryModel($this->getDoctrine()->getManager());
        $trivia_categories = $triviaCategoryModel->getTriviaCategories();
        return $this->render('default/triviacategorymenu.html.twig', ['triviaCategories' => $trivia_categories,]);
    }

}
