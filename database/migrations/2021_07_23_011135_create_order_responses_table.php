<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('order_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('order_id');
            $table->integer('user_order_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_responses');
    }
}