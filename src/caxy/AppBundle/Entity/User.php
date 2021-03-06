<?php

namespace caxy\AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="fos_user")
*/
class User extends BaseUser
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @var ArrayCollection
    *
    * @ORM\OneToMany(targetEntity="Answer", mappedBy="user")
    */
    private $answers;

    public function __construct()
    {
        parent::__construct();
        $this->answers = new ArrayCollection();
    }
}
