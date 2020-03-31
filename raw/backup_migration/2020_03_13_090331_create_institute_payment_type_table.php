<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutePaymentTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_payment_type', function (Blueprint $table) {
            $table->id();
            $table->integer('instituteId');
            $table->integer('paymentTypeId');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('institute_payment_type');
    }
}
