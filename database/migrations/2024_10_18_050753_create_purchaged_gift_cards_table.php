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
        Schema::create('purchaged_gift_cards', function (Blueprint $table) {
            $table->id();
            $table->string('company_id')->nullable();
            $table->string('gift_card_id')->nullable();
            $table->string('order_amount')->nullable();
            $table->enum('payment_status', ['Pending', 'Completed'])->default('Pending')->nullable();
            $table->string('trasaction_id')->nullable();
            $table->string('payment_method_type')->nullable(); 
            $table->string('is_term_condition')->nullable(); 
            $table->string('sub_total')->nullable(); 
            $table->string('quintity')->nullable(); 
            $table->string('company_name')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchaged_gift_cards');
    }
};
