<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_distributions', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->integer('net_profit')->nullable();
            $table->string('draw_date')->nullable();
            $table->unsignedBigInteger('treasury_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('dateTo')->nullable();
            $table->integer('distributed_profit')->nullable();
            $table->integer('amount')->nullable();
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
        Schema::dropIfExists('profit_distributions');
    }
}
