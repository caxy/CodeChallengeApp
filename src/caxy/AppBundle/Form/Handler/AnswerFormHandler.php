<?php

namespace caxy\AppBundle\Form\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use caxy\AppBundle\Service\AnswerManager;

class AnswerFormHandler
{
    private $answerManager;

    public function __construct(AnswerManager $answerManager) {
        $this->answerManager = $answerManager;
    }

    public function handle(FormInterface $form, Request $request) {
        if (!$request->isMethod('POST')) {
            return false;
        }

        $form->bind($request);

        if (!$form->isValid()) {
            return false;
        }

        $answer = $form->getData();

        $this->answerManager->saveAnswer($answer);
    }
}
