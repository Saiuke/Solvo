<?php

namespace Shop\Products;

use Shop\Categories\Extra;

class Controller extends Extra
{
    public function __construct(string $name, string $description, string $price, bool $isWired)
    {
        parent::__construct($name, $description, $price, $isWired);
        $this->setType("TV Controller");
    }

}