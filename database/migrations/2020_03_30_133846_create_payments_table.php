<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pupil_id');
            $table->string('fullname');
            $table->string('classname');
            $table->string('registration_number');
            $table->string('receipt_number')->unique();
            $table->string('banking_agent');
            $table->date('date_banked');
            $table->string('amount_Paid');
            $table->date('date_of_payments');
            $table->string('Newbalance');
            $table->string('Expected');
            $table->string('name');

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
        Schema::dropIfExists('payments');
    }
}
