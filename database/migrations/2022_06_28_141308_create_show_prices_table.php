<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('show_prices_num')->nullable();
            $table->integer('show_prices_type')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('unit_id');
            $table->integer('code')->nullable();
            $table->integer('quantity')->nullable();
            $table->longText('notes')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('dicount_value')->nullable();
            $table->integer('dicount_rate')->nullable();
            $table->integer('total_item_price')->nullable();
            $table->integer('total_items')->nullable();
            $table->integer('added_tax_value')->nullable();
            $table->integer('added_tax_rate')->nullable();
            $table->integer('profit')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('sales_returns')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('show_prices');
    }
}
