<?php

namespace caxy\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use caxy\AppBundle\Entity\CodeChallenge;
use caxy\AppBundle\Entity\Answer;
use caxy\AppBundle\Form\AnswerType;

/**
 * CodeChallenge controller.
 */
class CodeChallengeController extends Controller
{
    /**
     * Show active CodeChallenge.
     * @Route("/", name="codechallenge")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showActiveCodeChallengeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $activeCodeChallenge = $em->getRepository('AppBundle:CodeChallenge')->findOneBy(array('isActive' => true));

        $form = $this->createForm(new AnswerType(), null, array(
            'action' => $this->generateUrl('save_answer'),
        ));

        return $this->render('AppBundle:CodeChallenge:index.html.twig', array(
            'activeCodeChallenge' => $activeCodeChallenge,
            'form'                => $form->createView(),
        ));
    }

    /**
     * Save new answer for CodeChallenge.
     * @Route("/save-answer", name="save_answer")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function saveAnswerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $activeCodeChallenge = $em->getRepository('AppBundle:CodeChallenge')->findOneBy(array('isActive' => true));

        $answer = new Answer();
        $form = $this->createForm(new AnswerType(), $answer);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $answer = $form->getData();
            $answer->setCodeChallenge($activeCodeChallenge);

            $em->persist($answer);
            $em->persist($activeCodeChallenge);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('AppBundle:CodeChallenge:index.html.twig', array('form' => $form->createView()));
    }
}
