<?php

namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;

class SubjectModel {

    protected $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    

    public function getSubjects()
    {
        return $this->em->getRepository('AppBundle:Subject')->findAll();
    }
    
}