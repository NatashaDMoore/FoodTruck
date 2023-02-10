<?php

class Cart
{
    public $items = array();
    public $total = 0;

    public function addItem(Item $item)
    {
        $this->items[] = $item;
        $this->total += $item->Price;
    }

    public function getTotal()
    {
        return $this->total;
    }
    }

    $cart = new Cart();
    foreach ($items as $item) {
        $cart->addItem($item);
}#end cart()

// Cart Total
echo 'Cart Total: $' . $cart->getTotal();
