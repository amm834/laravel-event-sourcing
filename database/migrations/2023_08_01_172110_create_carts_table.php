<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid();

            $table->uuid('customer_uuid');
            $table->foreign('customer_uuid')
                ->references('uuid')
                ->on('customers');
            $table->string('state');

            $table->integer('total_price_excluding_vat')->default(0);
            $table->integer('total_price_including_vat')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
