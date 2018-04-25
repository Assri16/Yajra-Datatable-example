<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensis', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('id_jenispresensi')->unsigned();
            $table->time('jam_datang');
            $table->time('jam_pulang');
            $table->string('deskripsi');
            $table->string('tempat')->nullable();
            $table->integer('sakit')->nullable();
            $table->integer('cuti')->nullable();
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
        Schema::dropIfExists('presensis');
    }
}
