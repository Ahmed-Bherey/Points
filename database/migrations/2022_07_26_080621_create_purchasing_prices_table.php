<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasingPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasing_prices', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->integer('purchasing_price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('store_id');
            $table->timestamps();
            // $table->foreign('item_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('store_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasing_prices');
    }
}
