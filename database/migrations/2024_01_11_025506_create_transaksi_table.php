<?php

// database/migrations/xxxx_xx_xx_create_transaksis_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('no_invoice')->unique();
            $table->date('tanggal_bayar');
            $table->string('bukti_bayar')->nullable();
            $table->decimal('total_bayar', 10, 2);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
