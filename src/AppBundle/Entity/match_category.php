<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="match_category")
 */
class MatchCategory
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
     * @ORM\ManyToOne(targetEntity="TriviaCategory")
     */
    private $trivia_category_id;
    
    
    public function __construct()
    {
        // your own logic
    }
}