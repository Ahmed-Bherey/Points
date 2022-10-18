<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendingLeavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attending_leavings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staffData_id');
            $table->string('type')->nullable();
            $table->string('date')->nullable();
            $table->string('attendance_time')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->foreign('staffData_id')->references('id')->on('staff_data')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attending_leavings');
    }
}
