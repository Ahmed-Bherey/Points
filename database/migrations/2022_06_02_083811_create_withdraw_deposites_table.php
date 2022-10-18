<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawDepositesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_deposites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bank_id');
            $table->integer('process')->nullable();
            $table->integer('amount')->nullable();
            $table->string('date')->nullable();
            $table->unsignedBigInteger('treasury_id')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('withdraw_deposites');
    }
}
