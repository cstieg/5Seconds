<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="round")
 */
class Round
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Match")
     */
    private $match_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="TriviaCategoryLevel")
     */
    private $trivia_category_level_id;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $round_number;
    
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $start_time;
    
    /**
     * @ORM\ManyToOne(targetEntity="MatchPlayer")
     */
    private $winner;
    
    
    public function __construct()
    {
        // your own logic
    }
}