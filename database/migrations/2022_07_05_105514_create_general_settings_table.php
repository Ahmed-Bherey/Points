<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('working_days')->nullable();
            $table->integer('main_holiday')->nullable();
            $table->integer('sub_holiday')->nullable();
            $table->string('attendance_time')->nullable();
            $table->string('leaveing_time')->nullable();
            $table->string('attendance_leaving_duration')->nullable();
            $table->integer('work_hours')->nullable();
            $table->integer('absence_day')->nullable();
            $table->integer('delay_hour')->nullable();
            $table->integer('extra_hour')->nullable();
            $table->integer('basedOnNumOfMonthDay')->nullable();
            $table->integer('cost_type')->nullable();
            $table->integer('basedOnFixedAmount')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
