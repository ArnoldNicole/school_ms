<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pupil_id');
            $table->string('fullname');
            $table->string('maths');
            $table->string('english');
            $table->string('kiswa');
            $table->string('ScieAgriHsce');
            $table->string('ArtMusicPhe');
            $table->string('ssre');
            $table->string('Total');
            $table->unsignedBigInteger('exam_id');
            $table->index('pupil_id');
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
        Schema::dropIfExists('marks');
    }
}
