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

        // Drop the existing users table before creating the new one
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table){
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

        Schema::dropIfExists('users_temp');

        DB::statement('PRAGMA foreign_keys = ON;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_temp');
        Schema::dropIfExists('users');
    }
};
