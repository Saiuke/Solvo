<?php

namespace Shop\Products;

use Shop\Categories\ElectronicItem;

class Microwave extends ElectronicItem
{
    public function __construct(string $name, string $description, string $price)
    {
        parent::__construct($name, $description, $price);
        $this->setType("Microwave");
        $this->setMaxExtras(0);
    }
}