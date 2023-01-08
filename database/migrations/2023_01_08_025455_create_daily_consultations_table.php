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
        Schema::create('daily_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('gender');
            $table->string('age');
            $table->string('date_of_birth');
            $table->string('address');
            $table->string('ht_wt');
            $table->string('bp');
            $table->string('fbs');
            $table->string('service_provided');
            $table->string('med_given');
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
        Schema::dropIfExists('daily_consultations');
    }
};
