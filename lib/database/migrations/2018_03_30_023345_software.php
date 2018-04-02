<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Software extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('time');
            $table->string('capacity');
            $table->string('num_of_backup');
            $table->string('backup_calendar');
            $table->string('data_center');
            $table->integer('species');
            $table->integer('cate')->unsigned();
            $table->foreign('cate')
                ->references('id')
                ->on('catesoft')
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
        Schema::dropIfExists('software');
    }
}
