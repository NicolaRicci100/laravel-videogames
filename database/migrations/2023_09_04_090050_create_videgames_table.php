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
        Schema::create('videogames', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('cover')->nullable();
            $table->string('genre')->nullable();
            $table->date('release_date')->nullable();
            $table->float('price', 6, 2)->nullable();
            $table->string('platform')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('age_rating')->nullable();
            $table->tinyInteger('vote')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videogames');
    }
};
