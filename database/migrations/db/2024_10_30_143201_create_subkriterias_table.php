<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubkriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriterias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kriteria');
            
            $table->char('nama_subkriteria');
            $table->char('kode_subkriteria')->nullable();
            $table->enum('operator', ['<','>','<=','>='])->nullable();
            $table->integer('nilai_pembanding')->nullable();
            $table->char('satuan')->nullable();

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
        Schema::dropIfExists('subkriterias');
    }
}
