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
        Schema::create('purchases', function (Blueprint $table) {
            $table->snowflake('id')->primary();
            $table->date('date');
            $table->foreignSnowflake('supplier_id')->constrained();
            $table->foreignSnowflake('user_id')->constrained();
            $table->foreignSnowflake('vat_id')->constrained();
            $table->float('total_vat', 8, 2);
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
        Schema::dropIfExists('purchases');
    }
};
