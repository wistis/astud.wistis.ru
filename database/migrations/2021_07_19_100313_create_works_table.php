<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*                    */
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('file')->nullable();
            $table->integer('amount_page')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('theme_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('year')->nullable();
            $table->integer('price')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('intro')->nullable();
            $table->text('biblio')->nullable();
            $table->boolean('im_author')->nullable();
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
        Schema::dropIfExists('works');
    }
}
