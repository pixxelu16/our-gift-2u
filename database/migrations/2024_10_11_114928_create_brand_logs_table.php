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
        Schema::create('brand_logs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('main_logo')->nullable();
            $table->string('logo')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('brand_logs');
    }
};
