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
            $table->string('nameAr');
            $table->string('nameEn');
            $table->boolean('isOpen');
            $table->double('lang');
            $table->double('late');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('facebookUrl');
            $table->string('instagramUrl')->nullable();
            $table->foreignId('delivery_plans')->constrained();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
