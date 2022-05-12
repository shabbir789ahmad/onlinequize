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
         Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_brand_id')->constrained()->onDelete('cascade');
            $table->string('stock');
            $table->string('stock_sold')->nullable();
            $table->string('purchasing_price');
            $table->string('selling_price');
            $table->string('product_tax')->nullable();
            
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
        Schema::dropIfExists('product_stocks');
    }
};
