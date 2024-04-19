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
        Schema::create('delivery_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->double('base_price');
            $table->double('charge');
            $table->boolean('isFixed');
            $table->double('fix_charge')->nullable();
            $table->double('fix_zone')->nullable();
            $table->double('max_zone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_plans');
    }
};
