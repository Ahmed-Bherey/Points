<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number')->nullable();
            $table->unsignedBigInteger('suppler_id');
            $table->string('date')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->integer('unit_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->foreign('suppler_id')->references('id')->on('suppliers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('item_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_orders');
    }
}
