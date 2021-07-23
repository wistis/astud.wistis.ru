<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaysAllPrice extends Migration
{
    public function up()
    {
        Schema::table('pays', function (Blueprint $table) {
           $table->integer('all_price');
        });
    }

    public function down()
    {
        Schema::table('pays', function (Blueprint $table) {
            //
        });
    }
}