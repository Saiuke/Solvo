<?php

namespace Shop;

use Shop\Categories\ElectronicItem;

/**
 * Class Shop
 * @package Shop
 */
class Shop
{
    private array $cart;
    private float $total;

    /**
     * @return array
     */
    public function getCart(): array
    {
        return $this->cart;
    }

    /**
     * Adds items to the shopping cart
     * @param ElectronicItem $item
     * @param int $quantity
     */
    public function addItem(ElectronicItem $item, int $quantity = 1)
    {
        for ($i = 0; $i < $quantity; $i++) {
            $this->cart[] = $item;
        }
    }

    /**
     * Prints a list containing the cart's items and its totals
     * @return void
     */
    public function checkout(): void
    {
        if (empty($this->cart)) {
            echo "There are no items in your shopping cart";
        }
        $this->sortCart();
        $currentCart = $this->cart;
        echo "<h1><b>SHOPPING CART </b></h1><br>";
        foreach ($currentCart as $item) {
            echo "<b>Item name: </b>" . $item->getName() . " &nbsp;|&nbsp; <b>Value: </b>$" . $item->getPrice() . "<br>";
            if ($item->hasExtras()) {
                echo "<b>Extras:</b><br>";
                $item->printExtras();
            }
            echo "<b>SUBTOTAL: </b>$" . $item->getTotal() . "<br>";
            echo "<hr>";
        }
        echo "<h2><b>TOTAL: </b>$" . $this->getTotal() . "</h2>";
    }

    public function sortCart()
    {
        $currentCart = $this->cart;
        usort($currentCart, function ($a, $b) {
            return strcmp($a->getTotal(), $b->getTotal());
        });
        $this->cart = $currentCart;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        if (!isset($this->total)) {
            $this->setTotal();
        }
        return $this->total;
    }

    /**
     * @param float $total
     */
    private function setTotal(): void
    {
        $currentCart = $this->cart;
        $cartTotal = 0;
        foreach ($currentCart as $item) {
            $cartTotal += $item->getTotal();
        }
        $this->total = $cartTotal;
    }
}