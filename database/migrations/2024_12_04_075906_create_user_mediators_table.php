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
        Schema::create('user_mediators', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('title');
            $table->integer('sem')->default(0);
            $table->integer('ugo')->default(0);
            $table->integer('gra')->default(0);
            $table->integer('uve')->default(0);
            $table->integer('kor')->default(0);
            $table->integer('tru')->default(0);
            $table->integer('ban')->default(0);
            $table->text('desc')->nullable();
            $table->json('params')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_mediators');
    }
};
