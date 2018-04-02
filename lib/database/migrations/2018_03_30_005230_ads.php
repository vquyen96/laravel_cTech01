<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('num_of_keyword');
            $table->string('num_of_ads');
            $table->string('report');
            $table->string('set_logo');
            $table->string('install_fee');
            $table->string('display_position');
            $table->string('ads_fee');
            $table->string('service_fee');
            $table->integer('cate')->unsigned();
            $table->foreign('cate')
                ->references('id')
                ->on('cateads')
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
        Schema::dropIfExists('ads');
    }
}
