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
        Schema::create('user_point_logs', function (Blueprint $table) { 
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('tab_name')->nullable();
            $table->string('tab_type')->default('apply_coupon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_point_logs');
    }
};
