<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ite_items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('global_code')->nullable();
            $table->integer('local_code')->nullable();
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('max_discount')->nullable();
            $table->integer('wholesale_price')->nullable();
            $table->integer('max_sell')->nullable();
            $table->integer('half_wholesale')->nullable();
            $table->integer('min_qty')->nullable();
            $table->integer('pur_price')->nullable();
            $table->integer('max_qty')->nullable();
            $table->timestamps();
            // $table->foreign('company_id')->references('id')->on('ite_companies')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('type_id')->references('id')->on('ite_types')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('unit_id')->references('id')->on('ite_units')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('color_id')->references('id')->on('ite_colors')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('size_id')->references('id')->on('ite_sizes')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('store_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ite_items');
    }
}
