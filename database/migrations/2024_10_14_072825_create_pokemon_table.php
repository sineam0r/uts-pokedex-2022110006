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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('species',100);
            $table->string('primary_type',50);
            $table->decimal('weight', 8, 2)->default(0);
            $table->decimal('height', 8, 2)->default(0);
            $table->integer('hp', 4)->default(0);
            $table->integer('attack', 4)->default(0);
            $table->integer('defense', 4)->default(0);
            $table->boolean('is_legendary')->default(false);
            $table->iamge('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
