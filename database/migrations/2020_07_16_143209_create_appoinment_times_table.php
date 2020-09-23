<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoinmentTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoinment_times', function (Blueprint $table) {
            $table->unsignedBigInteger('time_id')->index();
            $table->unsignedBigInteger('appoinment_id')->index();
            $table->foreign('appoinment_id')->references('id')->on('appoinments')->onDelete('cascade');
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
        Schema::dropIfExists('appoinment_times');
    }
}
