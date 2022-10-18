<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedSalesBillTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returned_sales_bill_totals', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('representative_id')->nullable();
            $table->integer('bill_num')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->integer('payment_getway')->nullable();
            $table->unsignedBigInteger('treasury_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->longText('notes')->nullable();
            $table->integer('total_before_discount')->nullable();
            $table->integer('discount_value')->nullable();
            $table->integer('total_after_discount')->nullable();
            $table->integer('added_tax_value')->nullable();
            $table->integer('total')->nullable();
            $table->integer('paid')->nullable();
            $table->integer('rest')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('representative_id')->references('id')->on('representatives')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('store_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returned_sales_bill_totals');
    }
}
