<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspensions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pupil_id');
            $table->string('registration_number');
            $table->string('Father_email')->nullable();
            $table->string('Mother_email')->nullable();
            $table->string('Guardian_email')->nullable();
            $table->string('Father_contact')->nullable();
            $table->string('Mother_contact')->nullable();
            $table->string('Guardian_contact')->nullable();
            $table->string('subject');
            $table->text('message');

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
        Schema::dropIfExists('suspensions');
    }
}
