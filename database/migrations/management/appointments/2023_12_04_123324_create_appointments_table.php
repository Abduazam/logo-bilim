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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number')->default(0);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->bigInteger('service_price');
            $table->time('start_time');
            $table->foreignId('appointment_status_id')->references('id')->on('appointment_statuses')->onDelete('cascade');
            $table->date('created_date');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['number', 'branch_id', 'teacher_id', 'service_id', 'start_time', 'created_date'], 'n_b_id_t_id_s_id_s_t_unique_index');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
