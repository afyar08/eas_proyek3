<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->string('KodeNota')->primary();
            $table->string('KodeTenan');
            $table->string('KodeKasir');
            $table->date('TglNota');
            $table->time('JamNota');
            $table->decimal('JumlahBelanja', 10, 2);
            $table->decimal('Diskon', 10, 2);
            $table->decimal('Total', 10, 2);
            $table->timestamps();

            $table->foreign('KodeTenan')->references('KodeTenan')->on('tenan')->onDelete('cascade');
            $table->foreign('KodeKasir')->references('KodeKasir')->on('kasir')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota');
    }
};
