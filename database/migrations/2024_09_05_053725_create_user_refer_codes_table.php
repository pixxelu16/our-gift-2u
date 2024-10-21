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
        Schema::create('user_refer_codes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('refer_code')->nullable();
            $table->date('expire_date')->nullable();
            $table->enum('status', ['Pending', 'Approved','Rejected'])->default('Approved')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_refer_codes');
    }
};
