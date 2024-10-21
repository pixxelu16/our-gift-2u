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
            //
            $table->string('first_name')->nullable()->after('email');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('mobile')->nullable()->after('last_name');
            $table->enum('user_type', ['Admin', 'Customer', 'Subscriber','Company'])->default('Customer')->after('mobile');
            $table->enum('is_user_payble', ['Yes', 'No'])->default('Yes')->after('user_type');
            $table->string('company_name')->nullable()->after('is_user_payble');
            $table->string('company_abn')->nullable()->after('company_name');
            $table->string('address')->nullable()->after('company_abn');
            $table->string('contact_person')->nullable()->after('address');
            $table->string('department')->nullable()->after('contact_person');
            $table->string('suburb')->nullable()->after('department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('mobile');
            $table->dropColumn('user_type');
        });
    }
};
