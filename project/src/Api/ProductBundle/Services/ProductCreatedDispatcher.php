<?php

namespace Api\ProductBundle\Services;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Api\ProductBundle\Events\ProductCreatedEvent;
use Api\ProductBundle\Listeners\ProductCreatedListener;
use Api\ProductBundle\Entity\Product;

class ProductCreatedDispatcher
{
    public $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;        
    }

    public function dispatch(Product $product)
    {
        $listener = new ProductCreatedListener();
        $this->dispatcher->addListener('product.created', array($listener, 'onProductIsCreatedEvent'));
        $this->dispatcher->dispatch(ProductCreatedEvent::NAME, new ProductCreatedEvent($product));
    }
}