<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->integer('work_day_num')->nullable();
            $table->string('main_holiday')->nullable();
            $table->string('sub_holiday')->nullable();
            $table->string('attendance_time')->nullable();
            $table->string('leaving_time')->nullable();
            $table->string('attendance_leaving_duration')->nullable();
            $table->integer('normal_holiday_num')->nullable();
            $table->integer('casual_holiday_num')->nullable();
            $table->integer('work_hours')->nullable();
            $table->integer('absence_day')->nullable();
            $table->integer('delay_hour')->nullable();
            $table->integer('extra_hour')->nullable();
            $table->integer('basedOnNumOfMonthDay')->nullable();
            $table->integer('cost_type')->nullable();
            $table->integer('extra_fixed_amount')->nullable();
            $table->integer('basedOnFixedAmount')->nullable();
            $table->integer('delay_fixed_amount')->nullable();
            $table->integer('cost_time')->nullable();
            $table->timestamps();
            $table->foreign('staff_id')->references('id')->on('staff_data')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_settings');
    }
}
