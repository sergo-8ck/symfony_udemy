<?php

namespace AppBundle\Controller;

use AppBundle\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('@App/default/index.html.twig');
    }

	/**
	 * @Route("/feedback", name="feedback")
	 */
    public function feedbackAction(Request $request)
    {
        $form = $this->createForm(FeedbackType::class);
        $form->add('submit', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $feedback = $form->getData();

            $em =  $this->getDoctrine()->getManager();

            //add
            $em->persist($feedback);
            //save
            $em->flush();

            $this->addFlash('success', 'Saved');
            //redirect
            return $this->redirectToRoute('feedback');
        }



    	return $this->render('@App/default/feedback.html.twig', [
    	    'feedback_form' => $form->createView()
        ]);
    }
}
