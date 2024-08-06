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
        Schema::create('weekly_pickup_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('day')->nullable(); //(e.g., Monday, Tuesday, etc.)
            $table->string('start_time')->nullable(); //start_time (e.g., 09:00:00)
            $table->string('end_time')->nullable(); //end_time (e.g., 17:00:00)
            $table->foreignId('food_item_id')->constrained('food_items')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_pickup_schedules');
    }
};
