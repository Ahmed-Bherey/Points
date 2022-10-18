<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('sub_unit')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('ite_units')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_units');
    }
}
