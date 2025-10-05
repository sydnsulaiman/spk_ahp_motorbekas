<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubkriteriaSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriteria_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kriteria')->nullable();
            $table->integer('id_subkriteria')->nullable();
            $table->integer('id_perhitungan')->nullable();
            $table->double('prioritas');
            $table->double('eigen_value');
            $table->double('jumlah');
            $table->double('total_eigen');
            $table->double('ratio_index');
            $table->double('ci');
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
        Schema::dropIfExists('subkriteria_summaries');
    }
}
