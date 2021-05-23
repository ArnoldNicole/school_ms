<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePupilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pupils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('address');
            $table->string('registration_number');
            $table->string('upi_number');
            $table->string('birth_certificate_number');
            $table->date('date_of_admission');
            $table->date('date_of_birth');
            $table->string('status')->default('active');
            $table->string('gender')->default('unknown');
            $table->string('admissionFees')->nullable();
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
        Schema::dropIfExists('pupils');
    }
}
