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
        Schema::create('payment_type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_type_id')->references('id')->on('payment_types')->onDelete('cascade');
            $table->string('slug', 5);
            $table->string('translation')->nullable();
            $table->timestamps();

            $table->unique(['payment_type_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_type_translations');
    }
};
