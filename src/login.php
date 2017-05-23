<?php
namespace FiveSeconds\Login;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MainPageController extends Controller
{
    /**
     * @Route ("/", name="main_page")
     */
    public function mainPage()
    {
        echo "Main Page";
    }
}

class LoginController extends Controller
{
    /**
     * Matches /blog exactly
     *
     * @Route("/login", name="login")
     */
    public function listAction()
    {
        echo 'Login';
    }
}