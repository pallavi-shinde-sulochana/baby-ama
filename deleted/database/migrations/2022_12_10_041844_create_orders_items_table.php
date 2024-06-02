<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->integer('product_id')->default(0);
            $table->integer('category_id')->nullable();
            $table->decimal('price', 20, 2)->nullable();
            $table->string('image')->nullable();
            $table->integer('order_quantity')->nullable();
            $table->integer('stock_at_order')->nullable();
            $table->decimal('total_price', 20, 2)->nullable();
            $table->decimal('vat_rate', 20, 2)->nullable();
            $table->decimal('vat_amount', 20, 2)->nullable();
            $table->decimal('grant_total', 20, 2)->nullable();
            $table->decimal('customer_discount', 20, 2)->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('orders_items');
    }
}
