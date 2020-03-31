<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditTrailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_trail', function (Blueprint $table) {
            $table->id();
            $table->string('entityType', 200);
            $table->integer('entityId');
            $table->string('activity', 100);
            $table->integer('cityId');
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
        Schema::dropIfExists('audit_trail');
    }
}
