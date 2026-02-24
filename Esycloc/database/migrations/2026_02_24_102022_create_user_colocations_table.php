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
        Schema::create('user_colocations', function (Blueprint $table) {
            
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('colocation_id')->constrained('colocations');
            $table->enum('role_colocation', ['owner', 'membre']);
            $table->dateTime('jointed_at');
            $table->dateTime('left_at');
            $table->timestamps();
            $table->primary(['user_id', 'colocation_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_colocations');
    }
};
