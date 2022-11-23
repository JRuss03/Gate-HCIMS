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
        Schema::create('pregnants', function (Blueprint $table) {
            $table->id();
            $table->string('mother_name');
            $table->string('age');
            $table->string('numberofchildren')->nullable();
            $table->string('children')->nullable();
            $table->string('mensdate');
            $table->string('prob_bdate');
            $table->string('problem')->nullable();
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
        Schema::dropIfExists('pregnants');
    }
};
