<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        DB::statement("
            INSERT INTO `restaurant_types` (`id`, `name`) VALUES
            (1, 'Cafe'),
            (2, 'Restaurant')
        ");


        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('stars')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('set null');
            $table->foreignId('restaurant_type_id')->nullable()->constrained('restaurant_types')->onDelete('set null');
            $table->tinyInteger('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_types');
        Schema::dropIfExists('restaurants');
    }
};
