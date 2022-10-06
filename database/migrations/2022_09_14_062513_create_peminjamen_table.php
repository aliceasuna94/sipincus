<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->integer('prodi');
            $table->integer('kode_infocus');
            $table->string('matakuliah');
            $table->string('dosen');
            $table->string('ruang');
            $table->string('nama');
            $table->string('stambuk');
            $table->timestamp('waktu_peminjaman')->nullable();
            $table->timestamp('waktu_pengembalian')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('item_infocus')->default(false);
            $table->boolean('item_power')->default(false);
            $table->boolean('item_hdmi')->default(false);
            $table->boolean('item_cok')->default(false);
            $table->boolean('item_penyangga')->default(false);
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
        Schema::dropIfExists('peminjamen');
    }
}
