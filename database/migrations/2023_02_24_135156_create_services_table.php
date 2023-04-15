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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();

            $table->tinyText('name');
            $table->longText('description_ar');
            $table->longText('description_fr');
            $table->longText('description_en');

            $table->string('keywords');

            $table->double('current_price');
            $table->string('duration')->nullable();
            $table->tinyInteger('status')->default(1);   //archived: 0, avtive: 1

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
