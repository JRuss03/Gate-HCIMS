<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('checkup_id');
            $table->string('uniqid');
            $table->string('date');
            $table->string('weight');
            $table->string('length');
            $table->string('age_in_mos');
            $table->string('nutritional_status');
            $table->string('physical_exam');
            $table->string('management');
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
        Schema::dropIfExists('follow_ups');
    }
};
