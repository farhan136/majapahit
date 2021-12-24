<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_produksi', function (Blueprint $table) {
            $table->id();
            $table->string('NPK', 5);
            $table->dateTime('tanggal_transaksi');
            $table->string('lokasi', 4);
            $table->string('kode', 4);
            $table->integer('qty_actual');
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
        Schema::dropIfExists('transaksi_produksi');
    }
}
