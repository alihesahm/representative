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
                Schema::create('brokers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('residency_number')->nullable();
            $table->string('job_number')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->string('job_title')->nullable();
            $table->string('nationality')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('department')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brokers');
    }
};
