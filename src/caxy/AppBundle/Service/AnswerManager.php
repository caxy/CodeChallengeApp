<?php

namespace caxy\AppBundle\Service;

use Doctrine\ORM\EntityManager;
use caxy\AppBundle\Entity\Answer;

class AnswerManager
{
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function saveAnswer(Answer $answer) {
        $this->entityManager->persist($answer);
        $this->entityManager->flush();
    }
}
