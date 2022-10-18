<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreasuryProcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treasury_proces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treasury_id')->nullable();
            $table->integer('type')->nullable();
            $table->integer('creditor')->nullable();
            $table->integer('debtor')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('treasury_proces');
    }
}
