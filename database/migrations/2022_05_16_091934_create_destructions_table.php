<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destructions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('assets_amount')->nullable();
            $table->integer('destructions_amount')->nullable();
            $table->string('date')->nullable();
            $table->integer('pure_asset')->nullable();
            $table->integer('destruction_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destructions');
    }
}
