<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('section_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('section_type_id')->constrained()->onDelete('cascade');
            $table->string('style_variant'); // Style 1, Style 2, etc.
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->integer('config_properties')->default(1);
            $table->boolean('status')->default(true);
            $table->json('config_schema')->nullable(); // For advanced configuration
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('section_templates');
    }
};
