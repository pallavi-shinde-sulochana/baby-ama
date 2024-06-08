<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssigneddoctorinfoToAppoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appoinments', function (Blueprint $table) {
            $table->string('assigned_doctor')->nullable();
            $table->string('assigned_specialists')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appoinments', function (Blueprint $table) {
            $table->dropColumn('assigned_doctor');
            $table->dropColumn('assigned_specialists');
        });
    }
}
