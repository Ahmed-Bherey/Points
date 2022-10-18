<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('total_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('quantity')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->unsignedBigInteger('unit_id');
            $table->integer('discount_value2')->nullable();
            $table->integer('discount_rate2')->nullable();
            $table->integer('total_price')->nullable();
            $table->timestamps();
            // $table->foreign('total_id')->references('id')->on('total_sales_bills')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('item_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('unit_id')->references('id')->on('ite_units')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_bills');
    }
}
