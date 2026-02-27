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
        Schema::create('apayers', function (Blueprint $table) {
            $table->id();
            $table->float('montant');
            $table->boolean('statut')->default(false);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('depense_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apayers');
    }
};
