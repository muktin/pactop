<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('orderNumber', 255);
            $table->date('orderDate');
            $table->date('deliveryDate');
            $table->integer('instituteId');
            $table->integer('orderStatusId');
            $table->integer('paymentId');
            $table->integer('deliveryStatusId');
            $table->integer('numberofCards');
            $table->string('Instructions', 255);
            $table->string('customData', 255);
            $table->integer('cardTypeId');
            $table->timestamp('createdAt');
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
        Schema::dropIfExists('order');
    }
}
