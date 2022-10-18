<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('total_id')->nullable();
            $table->string('date')->nullable();
            $table->unsignedBigInteger('storeFrom_id')->nullable();
            $table->unsignedBigInteger('storeTo_id')->nullable();
            $table->timestamps();
            $table->foreign('storeFrom_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('storeTo_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_transfers');
    }
}
