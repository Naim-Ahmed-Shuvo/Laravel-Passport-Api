<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('cat_id')->nullable();
            $table->string('subcat_id')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->longText('details')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('stock_out')->nullable();
            $table->string('hot_deal')->nullable();
            $table->string('buy_one_get_one')->nullable();
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
        Schema::dropIfExists('products');
    }
}
