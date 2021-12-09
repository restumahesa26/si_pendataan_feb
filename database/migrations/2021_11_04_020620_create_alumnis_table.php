<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->enum('jenis_kelamin', ['Laki-Laki','Perempuan'])->nullable();
            $table->string('npm')->nullable();
            $table->string('prodi')->nullable();
            $table->string('angkatan')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_lulus')->nullable();
            $table->float('ipk', 3,2)->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tempat_pekerjaan')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('riwayat_pendidikan_sd')->nullable();
            $table->string('riwayat_pendidikan_smp')->nullable();
            $table->string('riwayat_pendidikan_sma')->nullable();
            $table->string('file_riwayat_pendidikan_sd')->nullable();
            $table->string('file_riwayat_pendidikan_smp')->nullable();
            $table->string('file_riwayat_pendidikan_sma')->nullable();
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
        Schema::dropIfExists('alumnis');
    }
}
