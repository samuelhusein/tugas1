<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('gender');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('loc_foto');
            $table->string('loc_sertifikat');
            $table->string('loc_cv');
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
        Schema::dropIfExists('registrasis');
    }
}
