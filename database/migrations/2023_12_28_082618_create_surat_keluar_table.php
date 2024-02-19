<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat',4);
            $table->string('kode_surat_keluar',3);
            $table->string('sekolah')->default('smk');
            $table->char('kode_kab')->default('26');
            $table->string('tujuan');
            $table->date('tanggal_surat');
            $table->string('perihal');
            $table->text('file')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('surat_keluars');
    }
};
