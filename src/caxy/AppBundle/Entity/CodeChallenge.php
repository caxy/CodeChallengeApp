<?php

namespace caxy\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CodeChallenge
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CodeChallenge
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", options={"default": false})
     */
    private $isActive;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="codeChallenge")
     */
    private $answers;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="TestCase", mappedBy="codeChallenge")
     */
    private $testCases;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->testCases = new ArrayCollection();
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
     * @return CodeChallenge
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
     * @return CodeChallenge
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
    * Set isActive
    *
    * @param boolean $isActive
    * @return CodeChallenge
    */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
    * Get isActive
    *
    * @return boolean
    */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Get answers
     *
     * @return ArrayCollection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Add answer
     *
     * @param Answer $answer
     * @return CodeChallenge
     */
    public function addAnswer(Answer $answer)
    {
        $this->answers->add($answer);

        return $this;
    }

    /**
     * Get testCases
     *
     * @return ArrayCollection
     */
    public function getTestCases()
    {
        return $this->testCases;
    }

    /**
     * @return string;
     */
    public function __toString()
    {
        return $this->name;
    }
}
