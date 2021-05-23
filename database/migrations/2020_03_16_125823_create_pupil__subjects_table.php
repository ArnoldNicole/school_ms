<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePupilSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pupil__subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('English');
            $table->string('Kiswahili');
            $table->string('Maths');
            $table->string('SocialStudies');
            $table->string('Science');
            $table->string('ReligiousEducation');
            $table->string('optional');
            $table->unsignedBigInteger('pupil_id');
            $table->index('pupil_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pupil__subjects');
    }
}
