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
        Schema::create('gift_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('amount')->nullable();
            $table->string('image')->nullable();
            $table->string('card_amount')->nullable();
            $table->string('valid_date')->nullable();
            $table->string('claim_code')->nullable();
            $table->string('quintity')->nullable();
            $table->enum('status', ['Active', 'Suspend'])->default('Active')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_cards');
    }
};
