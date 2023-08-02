<?php

namespace App\Events\Cart;

use Carbon\Carbon;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class CartInitialized extends ShouldBeStored
{

    public function __construct(
        public readonly string $cartUuid,
        public readonly string $customerUuid,
        public readonly Carbon $date,
    )
    {
        //
    }

    public function handle()
    {

    }

}
