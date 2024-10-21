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
        Schema::create('user_upload_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('store_name')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('invoice_total')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('invoice_phone')->nullable();
            $table->enum('invoice_type', ['Normal', 'Manual'])->default('Normal')->nullable();
            $table->string('invoice_original_image')->nullable();
            $table->string('invoice_edited_image')->nullable();
            $table->enum('status', ['Pending', 'Approved','Rejected'])->default('Pending')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_upload_invoices');
    }
};
