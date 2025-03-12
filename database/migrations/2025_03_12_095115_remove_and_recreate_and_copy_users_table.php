<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('PRAGMA foreign_keys = OFF;');

        Schema::create('users_temp', function (Blueprint $table){
            $table->id();
            $table->string('display_name')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('sso_token');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role');
            $table->rememberToken();
            $table->bigInteger('score');
            $table->timestamps();
        });

        DB::statement('INSERT INTO users_temp (id, display_name, full_name, email, sso_token, email_verified_at, role, score, created_at, updated_at)
                        SELECT id, display_name, full_name, email, sso_token, email_verified_at, role, score, created_at, updated_at
                        FROM users');

        Schema::dropIfExists('users');

        Schema::rename('users_temp', 'users');

        DB::statement('PRAGMA foreign_keys = ON;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
