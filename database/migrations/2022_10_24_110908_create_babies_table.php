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
        Schema::create('babies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('birthday')->nullable();
            $table->string('mother_name');
            $table->string('father_name');
            $table->string('guardian');
            $table->string('guardian_contact_no');
            $table->string('purok');
            $table->string('created');
            $table->rememberToken();
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
        Schema::dropIfExists('baby');
    }
};
