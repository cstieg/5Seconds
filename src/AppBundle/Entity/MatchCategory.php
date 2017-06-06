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
    
    
    public function __construct(int $match_id, int $trivia_category_id)
    {
        $this->match_id = $match_id;
        $this->trivia_category_id = $trivia_category_id;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matchId
     *
     * @param \AppBundle\Entity\Match $matchId
     *
     * @return MatchCategory
     */
    public function setMatchId(\AppBundle\Entity\Match $matchId = null)
    {
        $this->match_id = $matchId;

        return $this;
    }

    /**
     * Get matchId
     *
     * @return \AppBundle\Entity\Match
     */
    public function getMatchId()
    {
        return $this->match_id;
    }

    /**
     * Set triviaCategoryId
     *
     * @param \AppBundle\Entity\TriviaCategory $triviaCategoryId
     *
     * @return MatchCategory
     */
    public function setTriviaCategoryId(\AppBundle\Entity\TriviaCategory $triviaCategoryId = null)
    {
        $this->trivia_category_id = $triviaCategoryId;

        return $this;
    }

    /**
     * Get triviaCategoryId
     *
     * @return \AppBundle\Entity\TriviaCategory
     */
    public function getTriviaCategoryId()
    {
        return $this->trivia_category_id;
    }
}
