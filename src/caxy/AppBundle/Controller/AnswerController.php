<?php

namespace caxy\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use caxy\AppBundle\Entity\Answer;
use caxy\AppBundle\Form\AnswerType;

class AnswerController extends Controller
{
    /**
     * Show answer page with active CodeChallenge.
     * @Route("/", name="answer_index")
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $activeCodeChallenge = $em->getRepository('AppBundle:CodeChallenge')->findOneBy(array('isActive' => true));

        $answer = new Answer();

        $form = $this->createForm(new AnswerType(), $answer);

        $formHandler = $this->get('caxy_app.answer_form_handler');
        if ($formHandler->handle($form, $request)) {
            return $this->redirectToRoute('admin');
        }

        return $this->render('AppBundle:Answer:index.html.twig', array(
            'activeCodeChallenge' => $activeCodeChallenge,
            'form'                => $form->createView(),
        ));
    }
}

