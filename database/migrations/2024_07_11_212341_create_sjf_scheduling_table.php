<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSjfSchedulingTable extends Migration
{
    public function up()
    {
        Schema::create('sjf_scheduling', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_barangkesenian');
            $table->integer('waktu_kedatangan');
            $table->integer('lama_eksekusi');
            $table->integer('mulai_eksekusi')->nullable();
            $table->integer('selesai_eksekusi')->nullable();
            $table->integer('turn_around')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_customer')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_barangkesenian')->references('id')->on('barangkesenian_m')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sjf_scheduling');
    }
}

