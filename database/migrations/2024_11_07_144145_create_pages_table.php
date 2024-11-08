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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('subtitle')->nullable();

            $table->string('title_teaser')->nullable();
            $table->string('img_teaser')->nullable();
            $table->text('text_teaser')->nullable();


            $table->string('img')->nullable();
            $table->string('img_top')->nullable();
            $table->longText('text')->nullable();
            $table->string('img_bottom')->nullable();
            $table->longText('text2')->nullable();

            $table->string('published')->default(1);
            $table->json('params')->nullable();
            $table->json('module')->nullable();


            $table->json('faq')->nullable();
            $table->string('faq_title')->nullable();

            $table->string('metatitle')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
