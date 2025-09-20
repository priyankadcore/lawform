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
        // database/migrations/YYYY_MM_DD_create_countries_table.php
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 2)->nullable()->comment('ISO 3166-1 alpha-2 code');
            $table->string('phone_code', 10)->nullable();
            $table->string('currency', 10)->nullable();
            $table->string('currency_symbol', 10)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->unique('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
