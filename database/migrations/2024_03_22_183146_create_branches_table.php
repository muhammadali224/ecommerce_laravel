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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->boolean('is_open');
            $table->double('lang');
            $table->double('late');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('facebook_url');
            $table->string('instagram_url')->nullable();
            $table->foreignId('delivery_plans')->constrained();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
