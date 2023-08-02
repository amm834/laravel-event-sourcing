<?php

namespace App\Domain\Cart\Projectors;

use App\Domain\Cart\Projections\CartItem;
use App\Events\Cart\CartItemAdded;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class CartItemProjector extends Projector
{
    public function onCartItemAdded(CartItemAdded $event): void
    {
        (new CartItem())->writeable()
            ->create([
                'uuid' => $event->cartItemUuid,
                'cart_uuid' => $event->cartUuid,
                'product_type' => $event->productType,
                'product_id' => $event->productId,
                'amount' => $event->amount,
                'price_per_item' => $event->amount,
                'price_per_item_excluding_vat' => $event->currentPrice->pricePerItemExcludingVat(),
                'price_per_item_including_vat' => $event->currentPrice->pricePerItemIncludingVat(),
                'vat_percentage' => $event->currentPrice->vatPercentage(),
                'vat_price' => $event->currentPrice->vatPrice(),
                'total_price_excluding_vat' => $event->getTotalPriceExcludingVat(),
                'total_price_including_vat' => $event->getTotalPriceIncludingVat(),
            ]);
    }
}
