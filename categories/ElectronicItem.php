<?php

namespace Shop\Categories;

/**
 * Class ElectronicItem
 * @package Shop\Categories
 */
abstract class ElectronicItem
{
    private string $name;
    private string $type;
    private string $description;
    private string $price;
    private array  $extras = array();
    private int    $maxExtras;

    /**
     * ElectronicItem constructor.
     * @param string $name
     * @param string $type
     * @param string $description
     * @param string $price
     */
    public function __construct(string $name, string $description, string $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getMaxExtras(): int
    {
        return $this->maxExtras;
    }

    /**
     * @param int $maxExtras
     */
    public function setMaxExtras(int $maxExtras): void
    {
        $this->maxExtras = $maxExtras;
    }

    /**
     * Add an extra to the current item
     * @param object $extra
     * @param int $quantity
     * @return bool
     */
    public function addExtra(object $extra, int $quantity = 1): bool
    {
        if (!$this->canAddExtras($quantity)) {
            return false;
        }
        for ($i = 0; $i < $quantity; $i++) {
            $this->extras[] = $extra;
        }
        return true;
    }

    /**
     * Returns true if is possible to add extras, otherwise returns false
     * @param int $quantity
     * @return bool
     */
    private function canAddExtras(int $quantity): bool
    {
        $numExtras = count($this->extras);
        if (($numExtras + $quantity) > $this->maxExtras) {
            return false;
        }
        return true;
    }

    /**
     * Removes an extra associated with the current object
     * @param string $extraName
     * @return bool
     */
    public function removeExtra(string $extraName): bool
    {
        // Returns false if there are no extras
        if (!$this->hasExtras()) {
            return false;
        }
        $currentExtras = $this->extras;
        foreach ($currentExtras as $extra) {
            $newExtras[] = $extra->name != $extraName ? $extra : '';
        }
        $this->extras = $newExtras;
        return true;
    }

    /**
     * Returns true if the object has any extras, otherwise returns false
     * @return bool
     */
    public function hasExtras(): bool
    {
        return !empty($this->extras);
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
     * @return array
     */
    public function getExtras(): array
    {
        return $this->extras;
    }

    /**
     * @param array $extras
     */
    public function setExtras(array $extras): void
    {
        $this->extras = $extras;
    }

    public function printExtras()
    {
        // Returns false if there are no extras
        if (!$this->hasExtras()) {
            return false;
        }
        $currentExtras = $this->extras;
        foreach ($currentExtras as $extra) {
            $extra->print();
        }
        echo "&nbsp;&nbsp;&nbsp;<b>Subtotal extras: </b>$" . $this->getTotalExtras() . "<br><br>";
    }

    /**
     * Returns the sum of the price of all extras
     * @return float
     */
    private function getTotalExtras(): float
    {
        // Returns false if there are no extras
        if (!$this->hasExtras()) {
            return 0;
        }
        $currentExtras = $this->extras;
        $totalExtras = 0;
        foreach ($currentExtras as $extra) {
            $totalExtras += $extra->getPrice();
        }
        return $totalExtras;
    }

    /**
     * Returns the total value of the product, including the extras
     * @return float
     */
    public function getTotal()
    {
        return $this->getPrice() + $this->getTotalExtras();
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
}
