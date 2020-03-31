<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('paymentTypeId');
            $table->integer('paymentStatusId');
            $table->string('transactionNumber', 50);
            $table->string('transactionAmount', 100);
            $table->string('tax', 50);
            $table->string('totalAmount', 100);
            $table->date('transactionDate');
            $table->integer('responseCode');
            $table->integer('responseStatus');
            $table->string('customData', 200);
            $table->tinyInteger('status');
            $table->dateTime('createdAt');
            $table->dateTime('updatedAt');
            $table->integer('createdBy');
            $table->integer('updatedBy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
