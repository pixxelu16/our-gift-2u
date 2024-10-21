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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('monthly_spend')->nullable();
            $table->string('rewards_points')->nullable();
            $table->string('membership_cost_per_year')->nullable();
            $table->string('revenue')->nullable();
            $table->string('price')->nullable();
            $table->string('membership_type')->nullable();
            $table->enum('is_home', ['No', 'Yes'])->default('No')->nullable(); 
            $table->enum('status', ['Active', 'Suspend'])->default('Active')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
