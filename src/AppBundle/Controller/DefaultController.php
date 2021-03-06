<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/register")
     */
    public function registerAction(Request $request)
    {
        return $this->render('default/register.html.twig');
    }

    /**
     * @Route("/users")
     */
    public function userDisplay(Request $request)
    {
        $conn = $this->get('database_connection');
        $users = $conn->fetchAll('SELECT * FROM user');
        return $this->render('default/users.html.twig', array(
            'users' => $users
        ));
    }    
    
    
    
}
