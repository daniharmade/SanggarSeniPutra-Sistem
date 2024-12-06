<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barangkesenian');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_admin');
            $table->date('date');
            $table->text('alamat');
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['PENDING', 'DISETUJUI', 'DIGUNAKAN', 'DITOLAK', 'EXPIRED', 'BATAL', 'SELESAI', 'DIBAYAR'])->default('PENDING');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_customer')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_barangkesenian')->references('id')->on('barangkesenian_m')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_lists');
    }
}


