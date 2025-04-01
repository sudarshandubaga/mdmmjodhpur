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
        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('designation')->nullable();
            $table->string('image');
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('subjects_taught')->nullable();
            $table->longText('description')->nullable();
            $table->string('team_type')->default('Teaching')->comment('Teaching / Non-Teaching / Other');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
