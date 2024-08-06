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

        Schema::create('food_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        DB::statement("
            INSERT INTO `food_types` (`id`, `name`) VALUES
            (1, 'Meals'),
            (2, 'Bread and Pastas'),
            (3, 'Groceries'),
            (4, 'Others')
        ");
        
        Schema::create('food_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('app_price', 8, 2)->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        DB::statement("
            INSERT INTO `food_sizes` (`id`, `name`, `price`, `app_price`) VALUES
            (1, 'Small', '15.00', '4.99'),
            (2, 'Medium', '18.00', '5.99'),
            (3, 'Large', '21.00', '6.99')
        ");


        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->nullable()->constrained('restaurants')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('daily_limit')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->foreignId('food_type_id')->nullable()->constrained('food_types')->onDelete('set null');
            $table->foreignId('food_size_id')->nullable()->constrained('food_sizes')->onDelete('set null');
            $table->tinyInteger('status')->default(1);// 0 may be later/ 1 start selling
            $table->tinyInteger('is_surprise')->default(0);
            $table->timestamps();
        });

        Schema::create('food_item_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_item_id')->constrained('food_items')->onDelete('cascade');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_types');
        Schema::dropIfExists('food_sizes');
        Schema::dropIfExists('food_items');
        Schema::dropIfExists('food_item_images');
    }
};
