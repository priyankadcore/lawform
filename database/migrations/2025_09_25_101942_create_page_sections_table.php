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
        Schema::create('page_sections', function (Blueprint $table) {
        $table->id(); // primary key
        $table->foreignId('page_id')->constrained()->onDelete('cascade');
        $table->foreignId('section_type_id')->constrained()->onDelete('cascade');
        $table->foreignId('section_template_id')->constrained()->onDelete('cascade');
        $table->integer('order')->default(0);
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
