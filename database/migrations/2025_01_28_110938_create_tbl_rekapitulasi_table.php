<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_rekapitulasi', function (Blueprint $table) {
            $table->bigIncrements('id_rekapitulasi');
            $table->date('tanggal');
            $table->integer('jmlh_perekam');
            $table->integer('jmlh_suket');
            $table->integer('jmlh_kia');
            $table->integer('jmlh_ktp');
            $table->integer('penerbitan_akte');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_rekapitulasi');
    }
};
