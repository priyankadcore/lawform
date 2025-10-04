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
       Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->string('title');         // e.g., Home, Services, About
            $table->string('slug');          // URL slug
            $table->foreignId('parent_id')   // For submenus like services1, team etc.
                ->nullable()
                ->constrained('navigations')
                ->onDelete('cascade');
            $table->integer('order')->default(0); // Optional: for sorting
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigations');
    }
};
