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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('identification_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('currency_code')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nationality_code')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->after('id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreignId('phone_country_code_id')->after('email')->nullable();
            $table->foreign('phone_country_code_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('phone_no')->nullable()->after('phone_country_code_id');
        });

        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->foreignId('identification_type_id')->constrained('identification_types')->onDelete('cascade');
            $table->string('identification_no');
            $table->string('phone_no')->nullable();
            $table->foreignId('phone_country_code_id')->nullable()->constrained('countries')->onDelete('cascade');
            $table->date('date_joined');
            $table->date('date_of_birth');
            $table->string('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->foreignId('phone_country_code_id')->nullable()->constrained('countries')->onDelete('cascade');
            $table->string('phone_no');
            $table->date('date_of_birth');
            $table->string('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->foreignId('phone_country_code_id')->nullable()->constrained('countries')->onDelete('cascade');
            $table->string('phone_no')->nullable();
            $table->foreignId('currency_code_id')->nullable()->constrained('countries')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staffs', function (Blueprint $table) {
            if (Schema::hasColumn('staffs', 'role_id')) {
                $table->dropForeign(['role_id']);
            }
        });

        Schema::table('staffs', function (Blueprint $table) {
            if (Schema::hasColumn('staffs', 'phone_country_code_id')) {
                $table->dropForeign(['phone_country_code_id']);
            }
            if (Schema::hasColumn('staffs', 'identification_type_id')) {
                $table->dropForeign(['identification_type_id']);
            }
        });

        Schema::table('user_activities', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['role_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['phone_country_code_id']);
            $table->dropColumn(['role_id', 'phone_country_code_id', 'phone_no']);
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropForeign(['phone_country_code_id']);
            $table->dropForeign(['currency_code_id']);
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['phone_country_code_id']);
        });

        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('staffs');
        Schema::dropIfExists('user_activities');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('roles');
    }
};
