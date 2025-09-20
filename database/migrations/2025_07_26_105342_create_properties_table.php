<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('address');
            $table->foreignId('city_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->foreignId('property_type_id')->constrained();
            $table->foreignId('property_status_id')->constrained();
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('area');
            $table->integer('year_built')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('garage')->default(false);
            $table->integer('garage_size')->nullable();
            $table->json('amenities')->nullable();
            $table->json('images')->nullable();
            $table->string('video_url')->nullable();
            $table->json('floor_plans')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
