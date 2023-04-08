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
        Schema::create('endpoints', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_done')->default(0);
            $table->string('section');
            $table->string('endpoint');
            $table->string('method');
            $table->string('header')->nullable();
            $table->string('body')->nullable();
            $table->string('description')->nullable();
            $table->string('response')->nullable();
            $table->tinyInteger('requireAuth')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endpoints');
    }
};
