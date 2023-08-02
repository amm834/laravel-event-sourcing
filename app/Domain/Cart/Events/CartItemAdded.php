<?php

namespace App\Events\Cart;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class CartItemAdded extends ShouldBeStored
{
    public function __construct(
        public readonly string $cartUuid,
        public readonly string $cartItemUuid,
        public readonly string $customerUuid,
        public readonly string $productUuid,
        public readonly int    $amount,
        public readonly Price  $price,
    )
    {
        //
    }
}
