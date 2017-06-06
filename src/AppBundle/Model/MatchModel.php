<?php

namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Match;
use AppBundle\Entity\MatchCategory;
use AppBundle\Entity\User;

class MatchModel {

    private $em;
    private $subjectTable;
    private $matchTable;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->subjectTable = $em->getRepository('AppBundle:Subject');
        $this->matchTable = $em->getRepository('AppBundle:Match');
    }
    

    public function getMatches()
    {
        return $this->matchTable->findAll();
    }
    
    public function addMatch(string $name, User $owner, array $subjects) 
    {
        $newMatch = new Match($name, $owner);
        $this->em->persist($newMatch);
        
        foreach ($subjects as $subject)
        {
            // TODO: select random TriviaCategory for the Subject, rather than using subject id
            $trivia_category = $subject->getId();
            
            
            $newMatchCategory = new MatchCategory($newMatch->getId(), $trivia_category);
            $this->em-persist($newMatchCategory);
        }
        
        $this->em->flush();
    }
    
    public function deleteMatch(int $matchID)
    {
        $match = $this->matchTable->find($matchID);
        $this->em->remove($match);
        $this->em->flush();
    }
    
    public function editMatch(int $matchID, string $newName, array $subjects)
    {
        $match = $this->matchTable->find($matchID);
        $match->setName($newName);
        
        // TODO: update subjects
        
        
        $this->em->persist($match);
        $this->em->flush();
    }
}
