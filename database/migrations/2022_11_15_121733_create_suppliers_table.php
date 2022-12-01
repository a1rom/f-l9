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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->snowflake('id')->primary();
            $table->string('name');
            $table->string('company_code')->unique();
            $table->unsignedTinyInteger('status')->default(1);
            $table->string('email', 60)->unique();
            $table->string('phone', 30)->unique();
            $table->string('street', 100);
            $table->string('city', 100);
            $table->string('post_code', 12);
            $table->string('country', 100);
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
        Schema::dropIfExists('suppliers');
    }
};
