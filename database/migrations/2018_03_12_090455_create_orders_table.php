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
            $table->string('number', 20);
            $table->longText('content');
            $table->integer('person')->nullable();
            $table->string('amount', 20);
            $table->string('name', 100);
            $table->string('email', 50);
            $table->string('phone', 20);
            $table->string('comment', 255);
            $table->integer('delivery');
            $table->integer('payment');
            $table->integer('status');
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
