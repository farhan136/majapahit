<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterKaryawanTable extends Migration
{
    public function up()
    {
        Schema::create('master_karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('alamat', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_karyawan');
    }
}
