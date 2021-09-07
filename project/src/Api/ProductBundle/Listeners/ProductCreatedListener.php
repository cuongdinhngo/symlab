<?php

namespace Api\ProductBundle\Listeners;

use Psr\Log\LoggerInterface;
use Api\ProductBundle\Events\ProductCreatedEvent;
use Monolog\Logger;

class ProductCreatedListener
{
    public function onProductIsCreatedEvent(ProductCreatedEvent $event)
    {
        $product = $event->getProduct();
        var_dump(['mode' => 'dispatch: event-listener','id' => $product->getId(), 'name' => $product->getName()]);
    }
}