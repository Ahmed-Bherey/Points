<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drawal_id');
            $table->integer('invoice_num')->nullable();
            $table->integer('withdrawal_value')->nullable();
            $table->string('date')->nullable();
            $table->string('invoice_date')->nullable();
            $table->timestamps();
            $table->foreign('drawal_id')->references('id')->on('industrials')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drawals');
    }
}
