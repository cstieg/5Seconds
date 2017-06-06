<?php

namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\TriviaCategory;

class TriviaCategoryModel {

    private $em;
    private $triviaCategoryTable;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->triviaCategoryTable = $em->getRepository('AppBundle:TriviaCategory');
    }
    

    public function getTriviaCategories()
    {
        return $this->triviaCategoryTable->findAll();
    }
    
    public function addTriviaCategory(String $name, String $description) 
    {
        $newTriviaCategory = new TriviaCategory($name, $description);
        $this->em->persist($newTriviaCategory);
        $this->em->flush();
    }
    
    public function deleteTriviaCategory(String $triviaCategoryID)
    {
        $triviaCategory = $this->triviaCategoryTable->find($triviaCategoryID);
        $this->em->remove($triviaCategory);
        $this->em->flush();
    }
    
    public function editTriviaCategory(String $trivaCategoryID, String $name, String $description)
    {
        $triviaCategory = $this->triviaCategoryTable->find($triviaCategoryID);
        $triviaCategory->setName($name);
        $triviaCategory->setDescription($description);
        $this->em->persist($triviaCategory);
        $this->em->flush();
    }
}