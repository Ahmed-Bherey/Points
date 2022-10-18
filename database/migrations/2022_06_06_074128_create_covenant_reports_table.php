<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovenantReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covenant_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('covenant_id');
            $table->integer('custodian')->nullable();
            $table->string('dateFrom')->nullable();
            $table->string('dateTo')->nullable();
            $table->timestamps();
            $table->foreign('covenant_id')->references('id')->on('covenant_data')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covenant_reports');
    }
}
