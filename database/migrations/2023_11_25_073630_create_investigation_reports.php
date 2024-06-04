<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigationReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->default(0);
            $table->integer('doctor_id')->default(0);
            $table->text('report_name')->nullable();
            $table->string('report_type')->nullable();
            $table->text('report_date')->nullable();
            $table->text('report_path')->nullable();
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
        Schema::dropIfExists('investigation_reports');
    }
}
