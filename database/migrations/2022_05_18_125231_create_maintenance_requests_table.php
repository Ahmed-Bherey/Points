<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->integer('receipt_num')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->integer('client_tel');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
            $table->unsignedBigInteger('engineer_id');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('rapair_place')->nullable();
            $table->integer('serial')->nullable();
            $table->string('capacity')->nullable();
            $table->string('problem')->nullable();
            $table->float('max_cost')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('ite_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('store_id')->references('id')->on('st_stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('engineer_id')->references('id')->on('engineers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_requests');
    }
}
