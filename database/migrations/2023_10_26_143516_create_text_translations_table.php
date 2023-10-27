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
        Schema::create('text_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('text_id')->references('id')->on('texts')->onDelete('cascade');
            $table->string('slug', 5);
            $table->string('translation')->nullable();
            $table->timestamps();

            $table->unique(['text_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_translations');
    }
};
