<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovenantAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covenant_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('covenant_id');
            $table->string('date')->nullable();
            $table->integer('amount')->nullable();
            $table->unsignedBigInteger('treasury_id');
            $table->unsignedBigInteger('bank_id');
            $table->integer('custodian')->nullable();
            $table->integer('process')->nullable();
            $table->integer('rest')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->foreign('covenant_id')->references('id')->on('covenant_data')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('covenant_accounts');
    }
}
