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
    	$someArray = [1, 2, 3];
    	$someValue = false;
        return $this->render('default/index.html.twig', [
        	'name' => $name,
	        'some_array' => $someArray,
	        'some_value' => $someValue
	        ]);
    }

	/**
	 * @Route("/feedback", name="feedback")
	 */
    public function feedbackAction()
    {
    	return $this->render('default/feedback.html.twig');
    }
}
