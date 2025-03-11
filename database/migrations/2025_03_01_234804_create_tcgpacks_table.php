<?php

// AUTHOR: Manuel Villegas Michel

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_c_g_packs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('image')->default('pokemon_tcg_pack_default.png');
            $table->string('franchise');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_c_g_packs');
    }
};
