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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('order_amount')->nullable();
            $table->string('coupon_code')->nullable();
            $table->enum('status', ['Pending', 'Refunded', 'Processing', 'On Hold', 'Cancelled', 'Failed', 'Completed', 'Shipped'])->default('Pending')->nullable();
            $table->enum('payment_status', ['Pending', 'Completed'])->default('Pending')->nullable();
            $table->string('trasaction_id')->nullable();
            $table->enum('shipping_type', ['Free', 'Paid'])->default('Free')->nullable();
            $table->string('shipping_amount')->nullable(); 
            $table->string('payment_method_type')->nullable(); 
            $table->string('is_order_type')->nullable(); 
            $table->string('is_term_condition')->nullable(); 
            $table->string('point_price')->nullable(); 
            $table->string('shiping_charges')->nullable(); 
            $table->string('insurance_fee')->nullable(); 
            $table->string('admin_fee')->nullable(); 
            $table->string('total_tax')->nullable(); 
            $table->string('sub_total')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
