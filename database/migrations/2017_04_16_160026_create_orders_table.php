<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('order_id');
            $table->string('customer')->nullable();
            $table->string('address')->nullable();
            $table->longText('description')->nullable();
            $table->integer('restaurant_id')->unsigned()->nullable();
            $table->integer('status')->default(0);
            $table->integer('admin_id')->unsigned();
            $table->integer('workspace_id')->unsigned();
            $table->timestamps();

            $table->unique(['order_id', 'workspace_id']);
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
