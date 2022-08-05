<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_jadwal', function (Blueprint $table) {
            $table->id('jadwal_id');
            $table->string('jadwal_poli_kode');
            $table->string('jadwal_pegawai_nomor');
            $table->string('jadwal_senin')->nullable();
            $table->string('jadwal_selasa')->nullable();
            $table->string('jadwal_rabu')->nullable();
            $table->string('jadwal_kamis')->nullable();
            $table->string('jadwal_jumat')->nullable();
            $table->string('jadwal_sabtu')->nullable();
            $table->string('jadwal_minggu')->nullable();

            $table->foreign('jadwal_poli_kode')->references('poli_kode')->on('master_poli')->cascadeOnDelete();
            $table->foreign('jadwal_pegawai_nomor')->references('pegawai_nomor')->on('master_pegawai')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_jadwal');
    }
}
