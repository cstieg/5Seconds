<?php

namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;


class UserModel {

    private $em;
    private $userTable;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->userTable = $em->getRepository('AppBundle:User');
    }
    

    public function getUsers()
    {
        return $this->userTable->findAll();
    }

}