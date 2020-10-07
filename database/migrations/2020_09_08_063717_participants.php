<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Participants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 40);
            $table->string('institusi', 40);
            $table->string('nohandphone', 15);
            $table->string('email', 40);
            $table->bigInteger('id_webinar')->unsigned()->nullable()->index(); // bikin relasi
            $table->string('buktipembayaran');
            $table->timestamps();
        });

        Schema::table('participants', function (Blueprint $table) {
            $table->foreign('id_webinar')->references('id')->on('webinars')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
