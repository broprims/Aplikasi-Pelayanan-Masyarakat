<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_surat', function (Blueprint $table) {
            $table->id();
            $table->string('kode_surat');
            $table->string('Jenis_surat');
            $table->string('id_registe');
            $table->string('nik');
            $table->string('no_kk');
            $table->string('nama');
            $table->string('kepala_keluarga');
            $table->string('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('gender');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('pekerjaan');
            $table->string('desa');
            $table->string('rt');
            $table->string('rw');
            $table->string('kode_pos');
            $table->string('kec');
            $table->string('kota');
            $table->string('kab');
            $table->string('provinsi');
            $table->string('negara');
            $table->string('alamat');
            $table->string('tgl_surat');
            $table->string('keterangan');
            $table->string('jenis_permohonan');

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
        Schema::dropIfExists('pengajuan_surat');
    }
}
