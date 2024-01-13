<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->string('id_register')->primary();
            $table->string('nik');
            $table->string('no_kk');
            $table->string('nama');
            $table->string('tgl_lahir');
            $table->string('gender');
            $table->string('alamat');
            $table->string('banjar');
            $table->string('desa');
            $table->string('kec');
            $table->string('kab');
            $table->string('provinsi');
            $table->string('negara');
            $table->string('status');
            $table->string('keterangan');
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
        Schema::dropIfExists('register');
    }
}
