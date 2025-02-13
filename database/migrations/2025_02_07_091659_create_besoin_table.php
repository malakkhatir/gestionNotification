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
        Schema::create('besoins', function (Blueprint $table) {
            $table->id('ref');
            $table->date('date');
            $table->foreignId('idMarche')->constrained('marche');
            $table->foreignId('idStatut')->constrained('statutbesoin');
            $table->foreignId('iduser')->constrained('users');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('besoins');
    }
};
