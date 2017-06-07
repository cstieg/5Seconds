<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="trivia_category_level")
 */
class TriviaCategoryLevel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="TriviaCategory")
     */
    private $trivia_category_id;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=4095)
     */
    private $sql_source;
    
    /**
     * @ORM\Column(type="string", length=4095)
     */
    private $sql_source;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $question_column;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $answer_column;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sort_order;
    
    /**
     * @ORM@Column(type="boolean")
     */
    private $is_descending;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sort_order;
        
    
    /*
     * @ORM\Column(type="integer")
     */
    private $start_limit;
    
    /*
     * @ORM\Column(type="integer")
     */
    private $end_limit;
    
    
    
    
    public function __construct()
    {
        // your own logic
    }
}