<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PengajuanJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id')->on('users')->onDelete('No Action')->cascadeOnUpdate();
            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id')->on('users')->onDelete('No Action')->cascadeOnUpdate();
            $table->date('jadwal');
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
        Schema::dropIfExists('pengajuan_jadwal');
    }
}
