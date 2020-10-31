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
            $table->foreignId('boulder_gym_id')->constrained()->onDelete('cascade');
            $table->string('grade');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('boulder_problems');
    }
}
