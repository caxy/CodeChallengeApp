<?php

namespace caxy\AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use caxy\AppBundle\Entity\Answer;

class AnswerEntityListener {
    public function postPersist(Answer $answer, LifecycleEventArgs $event) {
        $sandbox = new \PHPSandbox\PHPSandbox();
        $cc_func_name = $answer->getCodeChallenge()->getName();
        $sandbox->whitelist_func(array('implode', $cc_func_name));

        $testCases = $answer->getCodeChallenge()->getTestCases();

        foreach ($testCases as $testCase) {
            if (count($testCase->getArgs()) > 1) {
                $args = $testCase->getArgs();
                $output = $sandbox->execute(function($cc_func_name, $args) {
                    return $cc_func_name(implode(',', $args));
                });

                // Compare $output to $testCase->output
            }
        }
    }
}
