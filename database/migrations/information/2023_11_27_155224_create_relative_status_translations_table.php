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
        Schema::create('relative_status_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('relative_status_id')->references('id')->on('relative_statuses')->onDelete('cascade');
            $table->string('slug', 5);
            $table->string('translation')->nullable();
            $table->timestamps();

            $table->unique(['relative_status_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relative_status_translations');
    }
};
