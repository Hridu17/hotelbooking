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
        Schema::create('standard_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Room title/name
            $table->text('description')->nullable(); // Room description
            $table->decimal('price', 8, 2); // Price with 2 decimals
            $table->integer('capacity'); // Number of people
            $table->string('image_path')->nullable(); // File path for image
            $table->boolean('is_available')->default(true); // Room availability
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standard_rooms');
    }
};
