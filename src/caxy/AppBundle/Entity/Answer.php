<?php

namespace caxy\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Answer
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
     * @ORM\Column(name="answer", type="text")
     */
    private $answer;

    /**
     * @var CodeChallenge
     *
     * @ORM\ManyToOne(targetEntity="CodeChallenge", inversedBy="answers")
     */
    private $codeChallenge;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="answers")
     */
    private $user;

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
     * Set answer
     *
     * @param string $answer
     * @return Answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set codeChallenge
     *
     * @param CodeChallenge $codeChallenge
     * @return Answer
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
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Answer
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string;
     */
    public function __toString()
    {
        return $this->answer;
    }
}
