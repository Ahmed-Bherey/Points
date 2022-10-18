<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesNoBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_no_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('date');
            $table->unsignedBigInteger('delegate_id')->nullable();
            $table->integer('last_balance')->nullable();
            $table->integer('invoice_num')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('store_id');
            $table->integer('quantity')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('code')->nullable();
            $table->integer('discount_value')->nullable();
            $table->integer('discount_rate')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('added_tax_value')->nullable();
            $table->integer('added_tax_rate')->nullable();
            $table->unsignedBigInteger('treasury_id');
            $table->unsignedBigInteger('bank_id');
            $table->integer('total_returned')->nullable();
            $table->integer('paid')->nullable();
            $table->integer('rest')->nullable();
            $table->foreign('item_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('ite_units')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('store_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('sales_returns')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('delegate_id')->references('id')->on('representatives')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sales_no_bills');
    }
}
