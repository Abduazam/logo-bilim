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
        Schema::create('table_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreignId('relation_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreignId('column_id')->nullable()->references('id')->on('columns')->onDelete('set null');
            $table->string('method')->nullable();
            $table->timestamps();

            $table->unique(['table_id', 'relation_id', 'column_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_relations');
    }
};
