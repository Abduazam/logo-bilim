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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('branch_id')->nullable()->references('id')->on('branches')->onDelete('cascade');
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->bigInteger('payment_amount');
            $table->foreignId('payment_type_id')->references('id')->on('payment_types')->onDelete('cascade');
            $table->time('start_time');
            $table->time('end_time');
            $table->date('created_date');
            $table->foreignId('consultation_status_id')->references('id')->on('appointment_statuses')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'client_id', 'start_time', 'end_time', 'created_date'], 'u_id_c_id_s_t_e_t_unique_index');
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
