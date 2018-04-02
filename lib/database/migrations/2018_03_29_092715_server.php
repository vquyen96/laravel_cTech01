<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Server extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');

            $table->string('cpu');
            $table->string('capacity');

            $table->string('user');
            $table->string('core');

            $table->string('hdd');
            $table->string('ram');

            $table->string('ramfree');
            $table->string('bandwidth');

            $table->string('speed');
            $table->string('ip');

            $table->integer('species');
            $table->integer('cate')->unsigned();
            $table->foreign('cate')
                ->references('id')
                ->on('cateserver')
                ->onDelete('cascade');
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
        Schema::dropIfExists('server');
    }
}
