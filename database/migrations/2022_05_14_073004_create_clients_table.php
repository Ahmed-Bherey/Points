<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('tel')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('fax')->nullable();
            $table->string('email')->nullable();
            $table->integer('id_num')->nullable();
            $table->string('governorate')->nullable();
            $table->string('city')->nullable();
            $table->string('town')->nullable();
            $table->longText('note')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('representative_id');
            $table->integer('credit')->nullable();
            $table->integer('day')->nullable();
            $table->string('tax_file')->nullable();
            $table->integer('tax_num')->nullable();
            $table->integer('commerc_num')->nullable();
            $table->integer('dept')->nullable();
            $table->string('logo')->nullable();
            $table->integer('balance')->nullable();
            $table->timestamps();
            $table->foreign('representative_id')->references('id')->on('representatives')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
