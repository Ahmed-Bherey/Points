<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalDepositAdvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_deposit_advances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrowerData_id')->nullable();
            $table->string('date')->nullable();
            $table->integer('amount')->nullable();
            $table->unsignedBigInteger('treasury_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->integer('borrower_order')->nullable();
            $table->integer('process_type')->nullable();
            $table->integer('rest')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->foreign('borrowerData_id')->references('id')->on('borrower_data')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('withdrawal_deposit_advances');
    }
}
