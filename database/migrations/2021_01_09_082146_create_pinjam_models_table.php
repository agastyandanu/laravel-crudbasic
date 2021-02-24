<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pinjam', function (Blueprint $table) {
            $table->bigIncrements('pinjam_id');
            $table->integer('member_id');
            $table->integer('buku_id');
            $table->date('pinjam_tgl');
            $table->date('kembali_tgl');
            $table->integer('pinjam_biaya');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pinjam');
    }
}
