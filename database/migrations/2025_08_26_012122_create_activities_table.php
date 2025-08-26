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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->text('description');
            $table->foreignId('program_id')->nullable()->constrained()->onDelete('set null');
            $table->datetime('start_datetime');
            $table->datetime('end_datetime')->nullable();
            $table->string('location');
            $table->integer('max_participants')->nullable();
            $table->integer('current_participants')->default(0);
            $table->string('featured_image')->nullable();
            $table->enum('status', ['draft', 'published', 'completed', 'cancelled'])->default('draft');
            $table->boolean('is_recurring')->default(false);
            $table->json('recurring_schedule')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
