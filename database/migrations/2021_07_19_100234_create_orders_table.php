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
        /*name                  interval  */
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('comment')->nullable();
            $table->string('price')->nullable();
            $table->string('original')->nullable();
            $table->string('curs')->nullable();
            $table->string('vuz')->nullable();
            $table->string('amount_page')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('theme_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('antiplagiat_id')->nullable();
            $table->integer('font')->nullable();
            $table->integer('interval')->nullable();
            $table->integer('guarant')->nullable();
            $table->date('expired_at')->nullable();
            $table->date('premium_at')->nullable();
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
