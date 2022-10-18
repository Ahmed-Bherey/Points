<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountAddNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_add_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('discountAddNotification_type')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('date')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('last_balance')->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('discount_add_notifications');
    }
}
