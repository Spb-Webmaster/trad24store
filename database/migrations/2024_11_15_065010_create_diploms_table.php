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
        Schema::create('diploms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('training')->nullable();
            $table->string('name')->nullable();
            $table->string('date')->nullable();
            $table->string('published')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diploms');
    }
};
