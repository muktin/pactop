<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('addressLine1', 255);
            $table->string('addressLine2', 255);
            $table->string('Landmark', 255);
            $table->integer('cityId');
            $table->integer('stated');
            $table->integer('countryId');
            $table->string('customCity', 200);
            $table->string('customState', 200);
            $table->integer('pincode');
            $table->string('addressType', 100);
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
        Schema::dropIfExists('address');
    }
}
