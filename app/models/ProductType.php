<?php

namespace App\Model;

abstract class ProductType
{
    abstract public function create(Product $product, $id);
    abstract public function getSize($product);
}