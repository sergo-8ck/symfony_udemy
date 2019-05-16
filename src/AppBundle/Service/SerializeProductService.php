<?php
/**
 * Created by PhpStorm.
 * User: skarpov
 * Date: 16.05.2019
 * Time: 16:19
 */

namespace AppBundle\Service;


use AppBundle\Entity\Product;

class SerializeProductService
{
    public function serialize(Product $product)
    {
        $arr = [
            'title' => $product->getTitle(),
            'category' => $product->getCategory()->getName(),
            'price' => $product->getPrice()
        ];

        return $arr;
    }
}