<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivableAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivable_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receivable_id');
            $table->integer('process');
            $table->integer('amount')->nullable();
            $table->integer('balance')->nullable();
            $table->string('date')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->foreign('receivable_id')->references('id')->on('receivables_data')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receivable_accounts');
    }
}
