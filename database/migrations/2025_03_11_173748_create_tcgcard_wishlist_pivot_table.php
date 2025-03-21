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
        Schema::create('t_c_g_card_wish_list', function (Blueprint $table) {
            $table->id();
            $table->integer('t_c_g_card_id')->unsigned(); // NOTE: Mandatory syntax
            $table->integer('wish_list_id')->unsigned(); // NOTE: Mandatory syntax
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_c_g_card_wish_list');
    }
};
