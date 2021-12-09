<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->enum('jenis_kelamin', ['Laki-Laki','Perempuan'])->nullable();
            $table->string('npm')->nullable();
            $table->string('prodi')->nullable();
            $table->string('angkatan')->nullable();
            $table->string('riwayat_pendidikan_sd')->nullable();
            $table->string('riwayat_pendidikan_smp')->nullable();
            $table->string('riwayat_pendidikan_sma')->nullable();
            $table->string('file_riwayat_pendidikan_sd')->nullable();
            $table->string('file_riwayat_pendidikan_smp')->nullable();
            $table->string('file_riwayat_pendidikan_sma')->nullable();
            $table->string('scan_ktp')->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
}
