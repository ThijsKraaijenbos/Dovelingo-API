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
        Schema::disableForeignKeyConstraints();

        Schema::create('fill_in_the_blanks', function (Blueprint $table) {
            $table->id();
            $table->string('full_sentence');
            $table->string('video_path');
            $table->string('missing_words');
            $table->bigInteger('lesson_id')->nullable();
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fill_in_the_blanks');
    }
};
