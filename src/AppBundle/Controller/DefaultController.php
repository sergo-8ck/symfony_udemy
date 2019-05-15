<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
    	$name = 'World';
        return $this->render('default/index.html.twig', ['name' => $name]);
    }

	/**
	 * @Route("/feedback", name="feedback")
	 */
    public function feedbackAction()
    {
    	return $this->render('default/feedback.html.twig');
    }
}
