<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->unsignedBigInteger('bankFrom_id');
            $table->unsignedBigInteger('bankTo_id');
            $table->integer('value')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->foreign('bankFrom_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bankTo_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_transfers');
    }
}
