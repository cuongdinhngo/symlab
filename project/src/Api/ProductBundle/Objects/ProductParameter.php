<?php

namespace Api\ProductBundle\Objects;

use Api\ProductBundle\Entity\Product;

class ProductParameter
{
    public $name;

    public $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function mapEntity()
    {
        $product = new Product();
        $product->setName($this->name);
        $product->setDescription($this->description);
        return $product;
    }
}
