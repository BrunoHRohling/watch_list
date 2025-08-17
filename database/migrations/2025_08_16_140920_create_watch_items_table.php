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
        Schema::create('watch_items', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('type')->comment('movie or series');
            $table->smallInteger('year')->nullable();
            $table->string('status')->comment('planned, watching, watched or dropped');
            $table->tinyInteger('rating')->nullable()->comment('0–10');
            $table->string('poster_url')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_items');
    }
};
