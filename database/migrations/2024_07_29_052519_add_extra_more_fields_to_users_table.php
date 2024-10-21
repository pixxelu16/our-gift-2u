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
        Schema::table('users', function (Blueprint $table) {
            $table->string('country')->nullable()->after('user_type');
            $table->string('state')->nullable()->after('country');
            $table->string('postal_code')->nullable()->after('state');
            $table->string('membership_type')->nullable()->after('postal_code');
            $table->bigInteger('total_points')->default(0)->after('membership_type');
            $table->enum('user_status', ['Pending', 'Active', 'Suspend'])->default('Pending')->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
