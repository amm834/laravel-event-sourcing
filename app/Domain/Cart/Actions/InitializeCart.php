<?php

namespace App\Domain\Cart\Actions;

use App\Events\Cart\CartInitialized;
use Carbon\Carbon;

class InitializeCart
{
    public function __invoke(Customer $customer): Cart
    {
        $cartUuid = uuid();

        $event = new CartInitialized(
            cartUuid: $cartUuid,
            customerUuid: $customer->uuid,
            date: Carbon::now(),
        );

        $event->handle();

        return Cart::find($cartUuid);
    }
}
