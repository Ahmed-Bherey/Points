<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_cars', function (Blueprint $table) {
            $table->id();
            $table->integer('statement_num')->nullable();
            $table->integer('permission_type')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('storeFrom_id');
            $table->unsignedBigInteger('storeTo_id');
            $table->unsignedBigInteger('representative_id');
            $table->string('date')->nullable();
            $table->integer('target')->nullable();
            $table->integer('from')->nullable();
            $table->longText('notes')->nullable();
            $table->integer('final_balance')->nullable();
            $table->integer('previous_balance')->nullable();
            $table->integer('total_before_discount')->nullable();
            $table->integer('discount_value1')->nullable();
            $table->integer('discount_rate1')->nullable();
            $table->integer('sales_tax')->nullable();
            $table->integer('transportation_cost')->nullable();
            $table->integer('total_after_discount')->nullable();
            $table->integer('profit')->nullable();
            $table->integer('code')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('quantity_discount')->nullable();
            $table->integer('addition_rate')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('unit_id');
            $table->integer('discount_value2')->nullable();
            $table->integer('discount_rate2')->nullable();
            $table->integer('current_balance')->nullable();
            $table->integer('total_item_price')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('storeFrom_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('storeTo_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('representative_id')->references('id')->on('representatives')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reserve_cars');
    }
}
