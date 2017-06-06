<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="trivia_category")
 */
class TriviaCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="Subject")
     */
    private $subject_id;
    
    public function __construct(String $name, String $description = null)
    {
        $this->name = $name;
        $this->description = $description;
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
     * Set name
     *
     * @param string $name
     *
     * @return TriviaCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TriviaCategory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set subjectId
     *
     * @param \AppBundle\Entity\Subject $subjectId
     *
     * @return TriviaCategory
     */
    public function setSubjectId(\AppBundle\Entity\Subject $subjectId = null)
    {
        $this->subject_id = $subjectId;

        return $this;
    }

    /**
     * Get subjectId
     *
     * @return \AppBundle\Entity\Subject
     */
    public function getSubjectId()
    {
        return $this->subject_id;
    }
}
