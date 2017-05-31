<?php

namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Subject;

class SubjectModel {

    private $em;
    private $subjectTable;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->subjectTable = $em->getRepository('AppBundle:Subject');
    }
    

    public function getSubjects()
    {
        return $this->subjectTable->findAll();
    }
    
    public function addSubject(String $name, String $description) 
    {
        $newSubject = new Subject($name, $description);
        $this->em->persist($newSubject);
        $this->em->flush();
    }
    
}