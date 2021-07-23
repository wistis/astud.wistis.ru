<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    public function up()
    {
        /*/*"_token" => "GY2ITDuyMcg2d3AHKWPqOStsZAsOnkttyBHkLbNl"
  "email" => "ceo@wistis.ru"
  "order_id" => "1"
  "class" => "Works"
  "url" => "http://astud.wistis.ru/works/1"*/
        Schema::create('pays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->integer('user_id');
            $table->string('class');
            $table->integer('price');
            $table->integer('payd_at');

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pays');
    }
}