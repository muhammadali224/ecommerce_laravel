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
        Schema::create('branch_deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->double('base_price');
            $table->double('charge');
            $table->boolean('isFixed');
            $table->double('fix_charge');
            $table->double('fix_zone');
            $table->double('max_zone');
            // $table->boolean('isActive')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_deliveries');
    }
};
