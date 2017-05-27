<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="match_player")
 */
class MatchPlayer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Match")
     */
    private $match_id;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $score;
    
    
    public function __construct()
    {
        // your own logic
    }
}