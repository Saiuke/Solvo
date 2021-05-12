<?php

namespace Shop\Categories;

/**
 * Class Extra
 * @package Shop\Categories
 */
abstract class Extra
{

    private string $name;
    private string $type;
    private string $description;
    private string $price;
    private bool $isWired;

    public function __construct(string $name, string $description, string $price, bool $isWired)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->isWired = $isWired;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return bool
     */
    public function isWired(): bool
    {
        return $this->isWired;
    }

    /**
     * @param bool $isWired
     */
    public function setIsWired(bool $isWired): void
    {
        $this->isWired = $isWired;
    }

    /**
     * Outputs basic info about the current item
     */
    public function print()
    {
        echo "&nbsp;&nbsp;&nbsp;◈ " . $this->name . " | Price: $" . $this->price . "<br>";
    }

}
