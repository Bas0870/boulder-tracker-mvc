<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoulderProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boulder_problems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boulder_gym_id');
            $table->string('grade');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('boulder_gym_id')
                ->references('id')
                ->on('boulder_gyms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boulder_problems');
    }
}
