<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('allowed_users', function (Blueprint $table) {
            $table->timestamp('delete_at')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('allowed_users', function (Blueprint $table) {
            $table->timestamp('delete_at')->nullable(false)->change();
        });
    }

};
