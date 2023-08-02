<?php

namespace App\Domain\Cart\Projections;

use App\Domain\Cart\States\CartProjection\CartProjectionState;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\EventSourcing\Projections\Projection;

class Cart extends Projection
{
    protected $casts = [
        'total_price_excluding_vat' => 'integer',
        'total_price_including_vat' => 'integer',
        'state' => CartProjectionState::class,
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
