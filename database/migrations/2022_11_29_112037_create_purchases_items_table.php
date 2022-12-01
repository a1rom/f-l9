<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_items', function (Blueprint $table) {
            $table->snowflake('id')->primary();
            $table->foreignSnowflake('purchase_id')->constrained();
            $table->foreignSnowflake('product_id')->constrained();
            $table->integer('quantity');
            $table->decimal('price_vat_excl', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases_items');
    }
};
