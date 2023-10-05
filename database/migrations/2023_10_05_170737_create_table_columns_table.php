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
        Schema::create('table_columns', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');
            $table->string('column_name');
            $table->boolean('visible')->default(true);
            $table->boolean('sortable')->default(false);
            $table->string('method')->nullable();
            $table->timestamps();

            $table->unique(['table_name', 'column_name']);
            $table->index(['table_name', 'column_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_columns');
    }
};
