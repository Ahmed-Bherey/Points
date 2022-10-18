<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyBillTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_bill_totals', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->integer('invoice_num')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->integer('payment_getway')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('treasury_id')->nullable();
            $table->unsignedBigInteger('total_before_discount')->nullable();
            $table->unsignedBigInteger('discount_valuee')->nullable();
            $table->integer('total_after_discount')->nullable();
            $table->integer('tax_added_value_rate')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->integer('supplier_balance')->nullable();
            $table->unsignedBigInteger('delegate_id');
            $table->longText('notes')->nullable();
            $table->integer('total')->nullable();
            $table->integer('paid')->nullable();
            $table->integer('rest')->nullable();
            $table->integer('purchase_status')->nullable();
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('delegate_id')->references('id')->on('representatives')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_bill_totals');
    }
}
