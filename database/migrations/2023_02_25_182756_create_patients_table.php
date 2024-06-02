<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('umr_no')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->longText('address')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('age')->nullable();
            $table->date('d_o_b')->format('dd-mm-YYYY')->nullable();
            /*$table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('county')->nullable();
            $table->string('country')->nullable();*/
            $table->string('blood_group')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('op_no')->nullable();
            $table->longText('about_us')->nullable();
            $table->boolean('status')->nullable();
            $table->longText('extra_params')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
