<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderFilesTable extends Migration
{
    public function up()
    {
        Schema::create('order_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->nullable();
            $table->string('file')->nullable();
            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_files');
    }
}