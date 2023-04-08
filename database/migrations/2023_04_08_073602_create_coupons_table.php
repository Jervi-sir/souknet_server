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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->uuid('code');
            $table->string('description');
            $table->tinyInteger('discount_type');  // percentage 1, fixed 2
            $table->double('discount_amount');
            $table->date('date_valid_from');
            $table->date('date_valid_until');
            $table->integer('min_order_value')->nullable();
            $table->double('max_discount_value')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
