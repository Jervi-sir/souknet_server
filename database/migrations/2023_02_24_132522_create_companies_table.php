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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->tinyText('name');
            $table->tinyText('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyText('phone_number')->nullable();
            $table->string('social_media_list')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_fr')->nullable();
            $table->string('description_en')->nullable();
            $table->tinytext('location')->nullable();
            $table->tinyInteger('wilaya_number')->nullable();
            $table->tinyInteger('is_verified')->nullable();
            $table->foreignId('company_privilege_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
