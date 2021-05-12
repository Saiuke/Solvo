<?php

namespace Shop\Products;

use Shop\Categories\ElectronicItem;

/**
 * Class Television
 * @package Shop\Products
 */
class Television extends ElectronicItem
{
    public function __construct(string $name, string $description, string $price)
    {
        parent::__construct($name, $description, $price);
        parent::setType("TV");
        $this->setMaxExtras(PHP_INT_MAX);
    }
}