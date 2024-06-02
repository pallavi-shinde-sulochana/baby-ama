<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePediatricFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pediatric_forms', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable();//HEAT TO FOOD EXAMINATION
            $table->string('title')->nullable();// Head
            $table->string('description')->nullable();// Head
            $table->string('prefix')->nullable();// To identify and get tghe fields from the data
            $table->string('type')->nullable();// text radio texearea
            $table->text('options')->nullable();//
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('pediatric_forms');
    }
}
