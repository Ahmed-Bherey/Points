<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('publicAccount_id');
            $table->longText('notes');
            $table->integer('amount');
            $table->integer('treasury_id');
            $table->integer('bank_id');
            $table->integer('consumption');
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
        Schema::dropIfExists('general_expenses');
    }
}
