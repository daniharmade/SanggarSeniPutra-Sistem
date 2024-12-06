<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangkesenianM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangkesenian_m', function (Blueprint $table) {
            $table->id();
            // $table->json('foto')->nullable();
            // $table->string('foto')->nullable();
            $table->string('nama');
            $table->text('paket');
            $table->string('anggota');
            $table->integer('harga');
            $table->text('deskripsi');
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
        Schema::dropIfExists('barangkesenian_m');
    }
}
