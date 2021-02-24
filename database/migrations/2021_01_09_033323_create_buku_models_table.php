<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->bigIncrements('buku_id');
            $table->string('buku_kode', 20);
            $table->string('buku_judul', 255);
            $table->string('buku_pengarang', 255);
            $table->string('buku_penerbit', 255);
            $table->string('buku_tahun', 20);
            $table->integer('buku_tarif');
            $table->text('buku_img');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_buku');
    }
}
