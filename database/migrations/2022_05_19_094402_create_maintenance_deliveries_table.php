<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('engineer_id');
            $table->string('result')->nullable();
            $table->string('date')->nullable();
            $table->longText('notes')->nullable();
            $table->float('maintenance_cost')->nullable();
            $table->float('price')->nullable();
            $table->float('total')->nullable();
            $table->float('pre_paid')->nullable();
            $table->float('net')->nullable();
            $table->float('paid')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('maintenance_deliveries');
    }
}
