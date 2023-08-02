<?php

namespace App\Domain\Cart\Projectors;

use App\Domain\Cart\Projections\Cart;
use App\Domain\Cart\States\CartProjection\PendingCartState;
use App\Events\Cart\CartInitialized;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class CartProjector extends Projector
{
    public function onCartInitialized(CartInitialized $event): void
    {
        (new Cart())->writeable()->create([
            'uuid' => $event->cartUuid,
            'state' => PendingCartState::class,
            'customer_uuid' => $event->customerUuid,
            'created_at' => $event->date,
        ]);
    }
}
