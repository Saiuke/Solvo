<?php

namespace Shop\Products;

use Shop\Categories\ElectronicItem;

class Console extends ElectronicItem
{
    public function __construct(string $name, string $description, string $price)
    {
        parent::__construct($name, $description, $price);
        $this->setType("Console");
        $this->setMaxExtras(4);
    }
}