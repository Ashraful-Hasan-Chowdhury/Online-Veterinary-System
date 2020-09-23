<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class CreateCureAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cure_animals', function (Blueprint $table) {
            $table->unsignedBigInteger('animal_id')->index();
            $table->unsignedBigInteger('cure_id')->index();
            $table->foreign('cure_id')->references('id')->on('cures')->onDelete('cascade');
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
        Schema::dropIfExists('cure_animals');
    }
}
