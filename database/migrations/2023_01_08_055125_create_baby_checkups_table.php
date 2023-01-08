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
        Schema::create('baby_checkups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('baby_id');
            $table->string('gender');
            $table->string('mother_occupation');
            $table->string('mother_birthday');
            $table->string('father_occupation');
            $table->string('father_birthday');
            $table->string('address');
            $table->string('cp_no');
            $table->string('birth_weight');
            $table->string('birth_length');
            $table->string('h_circum');
            $table->string('nbs');
            $table->string('immunization')->nullable();
            $table->string('follow_up')->nullable();
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
        Schema::dropIfExists('baby_checkups');
    }
};
