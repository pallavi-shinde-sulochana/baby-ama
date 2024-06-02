<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientVaccinationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_vaccination_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('patient_id')->default(0);
            $table->integer('doctor_id')->default(0);
            $table->integer('vaccination_form_id')->default(0);
            $table->longText('answer')->nullable();
            $table->text('options')->nullable();
            $table->enum('is_checked', ['0', '1'])->default('0');
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
        Schema::dropIfExists('patient_vaccination_forms');
    }
}
