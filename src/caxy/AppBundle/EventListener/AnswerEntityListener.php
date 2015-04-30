<?php

namespace caxy\AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use caxy\AppBundle\Entity\Answer;

class AnswerEntityListener {
    public function postPersist(Answer $answer, LifecycleEventArgs $event) {
        $sandbox = new \PHPSandbox\PHPSandbox();
        $sandbox->set_option('validate_functions', false);
        $sandbox->set_option('allow_closures', true);
        $sandbox->set_option('allow_functions', true);
        // $sandbox->whitelist_keyword('function');
        // $sandbox->set_option('allow_functions', true);
        $cc_func_name = $answer->getCodeChallenge()->getName();
        $answerString = $answer->getAnswer();
        // $sandbox->define_func($cc_func_name, $answerString);
        // $sandbox->whitelist_func(array($cc_func_name, 'sprintf'));

        $sandbox->define_func($cc_func_name, function($a, $b) { return $b; });

        // echo $answerString;

        $output = $sandbox->execute(function($answerString) {
            return call_user_func_array($answerString, array(1,4));
        });

        echo $output;

        exit;
        /*
        // $testCases = $answer->getCodeChallenge()->getTestCases();
        foreach ($testCases as $testCase) {
            if (count($testCase->getArgs()) > 1) {
                $args = $testCase->getArgs();
                $output = $sandbox->execute(function() {
                    return call_user_func_array($cc_func_name, $args);
                });

                // Compare $output to $testCase->output
            }
        }
        */
    }
}
