<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('color_id');
            $table->integer('code')->nullable();
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('store_id');
            $table->longText('notes')->nullable();
            $table->longText('points')->nullable();
            $table->longText('profit')->nullable();
            $table->integer('pur_price')->nullable();
            $table->integer('max_discount')->nullable();
            $table->integer('max_sell')->nullable();
            $table->integer('min_qty')->nullable();
            $table->integer('max_qty')->nullable();
            $table->integer('promo')->nullable();
            $table->integer('balance')->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('ite_companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('type_id')->references('id')->on('ite_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('ite_units')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('color_id')->references('id')->on('ite_colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('id')->on('ite_sizes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('store_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
