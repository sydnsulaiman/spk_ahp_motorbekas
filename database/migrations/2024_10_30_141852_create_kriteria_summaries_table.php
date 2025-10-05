<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kriteria')->nullable();
            $table->char('nama_kriteria');
            $table->char('kode_kriteria');
            $table->char('operator');
            $table->char('nilai_pembanding')->nullable();
            $table->char('satuan')->nullable();
            $table->char('tipe')->nullable();

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
        Schema::dropIfExists('kriteria_summaries');
    }
}
