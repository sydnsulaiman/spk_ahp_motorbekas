<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotSubkriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_subkriterias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_perhitungan');
            $table->integer('id_kriteria');
            $table->integer('id_subkriteria');
            $table->integer('id_subkriteria_tujuan');
            $table->integer('bobot_subkriteria');
            $table->integer('bobot_subkriteria2');
            $table->integer('total_subkriteria');
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
        Schema::dropIfExists('bobot_subkriterias');
    }
}
