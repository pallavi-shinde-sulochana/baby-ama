<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number')->nullable();
            $table->integer('user_id')->default(0);
            $table->decimal('total_price', 20)->nullable();
            $table->text('order_note', 65535)->nullable();
            $table->string('order_status', 20)->default('pending');
            $table->string('invoice', 222)->nullable();
            $table->decimal('grant_total', 20)->nullable();
            $table->integer('item_count')->default(0);
            $table->decimal('discount_amount', 20)->nullable()->default(0.00);
            $table->integer('shipping_total')->default(0);
            $table->integer('shipping_tax')->default(0);
            $table->integer('total_tax')->default(0);
            $table->text('cart_id')->nullable();
            $table->boolean('payment_status')->default(0);
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->text('transaction_details')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
