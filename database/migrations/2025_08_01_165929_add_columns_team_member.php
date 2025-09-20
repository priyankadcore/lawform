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
        Schema::table('team_members', function (Blueprint $table) {
            //
            
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->tinyInteger('rating')->unsigned()->default(5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            //
            $table->dropColumn(['position', 'company', 'rating']);
        });
    }
};
