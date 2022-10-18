<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_installments', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->integer('invoice_num')->nullable();
            $table->string('invoice_date')->nullable();
            $table->unsignedBigInteger('treasury_id');
            $table->unsignedBigInteger('bank_id');
            $table->integer('total_of_all_installment')->nullable();
            $table->integer('rest')->nullable();
            $table->integer('monthly_total')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('pay_installments');
    }
}
