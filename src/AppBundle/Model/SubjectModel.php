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
    
    public function deleteSubject(String $subjectID)
    {
        $subject = $this->subjectTable->find($subjectID);
        $this->em->remove($subject);
        $this->em->flush();
    }
    
    public function editSubject(String $subjectID, String $newSubject, String $description)
    {
        $subject = $this->subjectTable->find($subjectID);
        $subject->setName($newSubject);
        $subject->setDescription($description);
        $this->em->persist($subject);
        $this->em->flush();
    }
}