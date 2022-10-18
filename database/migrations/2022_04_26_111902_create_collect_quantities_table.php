<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collect_quantities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('max_qty')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('actual_qty')->nullable();
            $table->unsignedBigInteger('storeFrom_id');
            $table->unsignedBigInteger('storeTo_id');
            $table->integer('turn_num')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('collect_quantities');
    }
}
