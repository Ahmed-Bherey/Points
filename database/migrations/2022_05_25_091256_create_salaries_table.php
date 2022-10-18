<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->integer('main')->nullable();
            $table->integer('loan')->nullable();
            $table->integer('absent')->nullable();
            $table->integer('absent_value')->nullable();
            $table->integer('insurance')->nullable();
            $table->integer('hours')->nullable();
            $table->integer('hours_value')->nullable();
            $table->integer('delay')->nullable();
            $table->integer('delay_value')->nullable();
            $table->integer('net_salary')->nullable();
            $table->integer('meal')->nullable();
            $table->integer('transition')->nullable();
            $table->integer('reward')->nullable();
            $table->integer('discount')->nullable();
            $table->timestamps();
            $table->foreign('staff_id')->references('id')->on('staff_data')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
