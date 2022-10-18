<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('total_id');
            $table->unsignedBigInteger('items_id');
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
            $table->foreign('items_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_permissions');
    }
}
