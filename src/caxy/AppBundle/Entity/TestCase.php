<?php

namespace caxy\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestCase
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TestCase
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
     * @var array
     *
     * @ORM\Column(name="args", type="array")
     */
    private $args;

    /**
     * @var string
     *
     * @ORM\Column(name="output", type="string", length=255)
     */
    private $output;

    /**
    * @var CodeChallenge
    *
    * @ORM\ManyToOne(targetEntity="CodeChallenge", inversedBy="testCases")
    */
    private $codeChallenge;

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
     * Set args
     *
     * @param array $args
     * @return TestCase
     */
    public function setArgs($args)
    {
        $this->args = $args;

        return $this;
    }

    /**
     * Get args
     *
     * @return array
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * Set output
     *
     * @param string $output
     * @return TestCase
     */
    public function setOutput($output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Get output
     *
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Set codeChallenge
     *
     * @param CodeChallenge $codeChallenge
     * @return TestCase
     */
    public function setCodeChallenge(CodeChallenge $codeChallenge)
    {
        $this->codeChallenge = $codeChallenge;

        return $this;
    }

    /**
     * Get codeChallenge
     *
     * @return CodeChallenge
     */
    public function getCodeChallenge()
    {
        return $this->codeChallenge;
    }

    /**
    * @return int;
    */
    public function __toString()
    {
        return $this->id;
    }
}
