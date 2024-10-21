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
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->enum('coupon_type', ['Normal','Company'])->default('Normal')->nullable();
            $table->enum('status', ['Pending','Active','Expire'])->default('Active')->nullable(); 
            $table->date('expire_date')->nullable();
            $table->string('price')->nullable();
            $table->enum('is_used', ['Yes','No'])->default('No')->nullable();
            $table->string('company_id')->nullable();
            $table->string('purchaged_gift_card_id')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_codes');
    }
};
