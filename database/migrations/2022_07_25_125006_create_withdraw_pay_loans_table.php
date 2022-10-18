<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawPayLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_pay_loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrowData_id')->nullable();
            $table->string('date')->nullable();
            $table->unsignedBigInteger('treasury_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->integer('paidFrom')->nullable();
            $table->integer('paidTo')->nullable();
            $table->integer('rest')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->foreign('borrowData_id')->references('id')->on('borrower_data')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('withdraw_pay_loans');
    }
}
