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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('broker_id')->nullable()->constrained();
            $table->foreignId('client_id')->nullable()->constrained();
            $table->foreignId('project_id')->nullable()->constrained();
            $table->foreignId('client_location_id')->nullable()->constrained('clients');
            $table->foreignId('project_location_id')->nullable()->constrained('projects');
            $table->string('purpose');
            $table->string('impression');
            $table->string('next_action');
            $table->string('neighborhood');
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
