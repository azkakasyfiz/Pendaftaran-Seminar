<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('judulwebinar', 100);
            $table->string('platform', 20);
            $table->string('tanggal', 40);
            $table->string('jam', 20);
            $table->string('keterangan1', 255)->nullable();
            $table->string('keterangan2', 255)->nullable();
            $table->string('poster');
            $table->string('linkmateri');
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
        Schema::dropIfExists('webinars');
    }
}
