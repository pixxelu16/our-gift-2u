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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_contact')->nullable();
            $table->string('billing_email')->nullable();
            $table->text('billing_street_address')->nullable(); 
            $table->text('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_post_code')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_contact')->nullable();
            $table->string('shipping_email')->nullable();
            $table->text('shipping_street_address')->nullable(); 
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_post_code')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('form_status')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
