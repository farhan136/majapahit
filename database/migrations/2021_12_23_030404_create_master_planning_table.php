<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPlanningTable extends Migration
{
    public function up()
    {
        Schema::create('master_planning', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 4);
            $table->integer('qty_target');
            $table->float('waktu_target');
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
        Schema::dropIfExists('master_planning');
    }
}
