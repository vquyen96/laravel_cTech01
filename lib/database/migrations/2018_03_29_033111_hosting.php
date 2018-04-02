<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hosting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('capacity');
            $table->string('bandwidth');
            $table->string('email');
            $table->string('ftp');
            $table->string('mysql');
            $table->string('mssqlserver');
            $table->string('domain');
            $table->string('ssl');
            $table->integer('species');
            $table->integer('cate')->unsigned();
            $table->foreign('cate')
                ->references('id')
                ->on('catehosting')
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
        Schema::dropIfExists('hosting');
    }
}
