<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returned_purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('total_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('sell_price')->nullable();
            $table->integer('purchasing_price')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->integer('discount_value')->nullable();
            $table->integer('discount_rate')->nullable();
            $table->integer('total_price')->nullable();
            $table->timestamps();
            // $table->foreign('total_id')->references('id')->on('returned_purchase_totals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('item_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('ite_units')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returned_purchases');
    }
}
