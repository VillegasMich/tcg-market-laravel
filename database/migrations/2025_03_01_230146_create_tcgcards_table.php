<?php

// AUTHOR: Manuel Villegas Michel

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
        Schema::create('t_c_g_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('franchise');
            $table->integer('price');
            $table->string('PSAgrade');
            $table->string('image');
            $table->date('launchDate');
            $table->string('rarity');
            $table->float('pullRate');
            $table->string('language');
            $table->integer('stock');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_c_g_cards');
    }
};
