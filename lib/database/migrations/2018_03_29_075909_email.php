<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Email extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('capacity');
            $table->string('email_address');
            $table->string('emai_forwarder');
            $table->string('mail_list');
            $table->string('park_domain');
            $table->string('add_on_domain');
            $table->string('private_ip');
            $table->integer('cate')->unsigned();
            $table->foreign('cate')
                ->references('id')
                ->on('cateemail')
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
        Schema::dropIfExists('email');
    }
}
