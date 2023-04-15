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

            $table->string('social_media_list')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_fr')->nullable();
            $table->longText('description_en')->nullable();

            $table->tinytext('address')->nullable();
            $table->tinytext('city')->nullable();
            $table->tinytext('state')->nullable();
            $table->tinytext('zip_code')->nullable();
            $table->tinytext('country')->nullable();
            $table->tinyText('phone_number')->nullable();
            $table->tinytext('website')->nullable();

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
