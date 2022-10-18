<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionCalculatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_calculates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('employee_id');
            $table->integer('commission')->nullable();
            $table->string('date')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('ite_items')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('staff_data')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commission_calculates');
    }
}
