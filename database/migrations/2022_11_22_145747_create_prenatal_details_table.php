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
        Schema::create('prenatal_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prenatal_id');
            $table->string('month');
            $table->string('detail_uniqid');
            $table->string('dateofvisit');
            $table->string('general')->nullable();
            $table->string('anemia')->nullable();
            $table->string('danger')->nullable();
            $table->string('swelling')->nullable();
            $table->string('pulse')->nullable();
            $table->string('temp')->nullable();
            $table->string('weight')->nullable();
            $table->string('bloodpressure')->nullable();
            $table->string('proteininurine')->nullable();
            $table->string('sugarinurine')->nullable();
            $table->string('position')->nullable();
            $table->string('vaccine')->nullable();
            $table->string('birth')->nullable();
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
        Schema::dropIfExists('prenatal_details');
    }
};
