<?php

namespace Api\ProductBundle\Events;

use Api\ProductBundle\Entity\Product;
use Symfony\Component\EventDispatcher\Event;

class ProductCreatedEvent extends Event
{
    const NAME = 'product.created';

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProduct()
    {
        return $this->product;
    }
}