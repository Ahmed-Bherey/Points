<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBounceNoBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounce_no_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->string('date')->nullable();
            $table->integer('last_balance')->nullable();
            $table->integer('receipt_num')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('store_id');
            $table->integer('quantity')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('discount_value')->nullable();
            $table->integer('discount_rate')->nullable();
            $table->integer('total_item_price')->nullable();
            $table->integer('tax_added_value')->nullable();
            $table->integer('tax_added_rate')->nullable();
            $table->integer('total_return')->nullable();
            $table->integer('paid')->nullable();
            $table->integer('rest')->nullable();
            $table->unsignedBigInteger('treasury_id');
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('item_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('ite_units')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('store_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bounce_no_bills');
    }
}
