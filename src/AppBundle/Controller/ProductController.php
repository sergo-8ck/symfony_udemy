<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Category;
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

    /**
     * @Route("/category/{id}", name="product_by_category")
     * @Template()
     *
     * @param Category $category
     * @return array
     */
    public function listByCategoryAction(Category $category)
    {
        $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findByCategory($category);

        return ['products' => $products];
	}
}