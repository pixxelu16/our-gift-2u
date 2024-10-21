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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('product_slug')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('product_sku')->nullable();
            $table->string('factory_id')->nullable();
            $table->string('barcode_number')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('product_price')->nullable();
            $table->string('shipping_price')->nullable();
            $table->bigInteger('product_quantity')->nullable();
            $table->bigInteger('pre_order_capacity')->nullable();
            $table->bigInteger('min_order_capacity')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['Pending', 'Active', 'Draft'])->default('Pending')->nullable();
            $table->bigInteger('view_count')->default('0')->nullable();
            $table->longText('technical_details')->nullable();
            $table->string('is_featured')->nullable();
            $table->string('product_cost')->nullable();
            $table->longText('manufacturer_email')->nullable();
            $table->enum('is_home', ['No', 'Yes'])->default('No')->nullable(); 
            $table->enum('is_banner_one', ['No', 'Yes'])->default('No')->nullable(); 
            $table->enum('is_banner_two', ['No', 'Yes'])->default('No')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
