<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserAddBalance extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->integer('balance')->nullable();
        });
    }

    public function down()
    {
        Schema::table('', function (Blueprint $table) {
            //
        });
    }
}