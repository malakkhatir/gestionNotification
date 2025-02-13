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
        Schema::create('besoin', function (Blueprint $table) {
            $table->integer('ref')->primary(); // Set 'ref' as the primary key (non-incrementing)
            $table->date('date')->nullable();
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
        Schema::dropIfExists('besoin');
    }
};
