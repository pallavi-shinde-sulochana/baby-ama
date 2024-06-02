<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_resources', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('alias');
            $table->text('meta')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('media_resources');
    }
}
