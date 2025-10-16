<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('client')->nullable();
            $table->date('project_date')->nullable();
            $table->text('description')->nullable();
            $table->string('project_url')->nullable();
            $table->string('technologies')->nullable();
            $table->string('featured_image');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
};