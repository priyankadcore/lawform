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
        Schema::create('page_section_fields', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('page_section_id'); 
            $table->string('field_key');
            $table->string('field_label')->nullable();
            $table->string('field_type')->nullable(); 
            $table->longText('field_value')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_section_fields');
    }
};
