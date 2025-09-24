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
       Schema::create('section_templates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('section_type_id')->constrained('section_types')->onDelete('cascade');
            $table->string('style_variant')->nullable();
            $table->json('fields')->nullable(); 
            $table->string('image')->nullable();  
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_templates');
    }
};
