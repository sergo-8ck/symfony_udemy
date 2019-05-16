<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
	/**
	 * @Route("/products", name="product_list")
	 * @Template()
	 */
	public function indexAction()
	{
	    $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findActive();

		return ['products' => $products];
	}

    /**
     * @Route("/product/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @Template()
     *
     * @param Product $product
     * @return array
     */
	public function showAction(Product $product)
	{
		return ['product' => $product];
	}
}