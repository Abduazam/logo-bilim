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
        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->string('name');
            $table->string('method', 255)->nullable();
            $table->boolean('sortable')->default(false);
            $table->boolean('visible')->default(true);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unique(['table_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('columns');
    }
};
