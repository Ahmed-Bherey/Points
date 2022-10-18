<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeTechniciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_technicians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technicianFrom_id');
            $table->unsignedBigInteger('technicianTo_id');
            $table->timestamps();
            $table->foreign('technicianFrom_id')->references('id')->on('technicians')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('technicianTo_id')->references('id')->on('technicians')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_technicians');
    }
}
