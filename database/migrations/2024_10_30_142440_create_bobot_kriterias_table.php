<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_kriterias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_perhitungan');
            $table->integer('id_kriteria');
            $table->integer('id_kriteria_tujuan');
            $table->double('bobot_kriteria')->nullable();
            $table->double('bobot_kriteria2')->nullable();
            $table->double('total')->nullable();
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
        Schema::dropIfExists('bobot_kriterias');
    }
}
