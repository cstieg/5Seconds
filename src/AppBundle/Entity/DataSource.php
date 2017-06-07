<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="data_source")
 */
class DataSource
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;
    
    /**
     * @ORM\Column(type="string", length=4095)
     */
    private $sourceURL;
    
    
    public function __construct($name, $sourceURL)
    {
        $this->name = $name;
        $this->sourceURL = $sourceURL;
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
     * @return DataSource
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
     * Set sourceURL
     *
     * @param string $sourceURL
     *
     * @return DataSource
     */
    public function setSourceURL($sourceURL)
    {
        $this->sourceURL = $sourceURL;

        return $this;
    }

    /**
     * Get sourceURL
     *
     * @return string
     */
    public function getSourceURL()
    {
        return $this->sourceURL;
    }
}
