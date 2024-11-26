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
        Schema::table('mediator_products', function (Blueprint $table) {
            $table->string('komanda_address')->nullable();
            $table->string('komanda_phone1')->nullable();
            $table->string('komanda_phone2')->nullable();
            $table->string('komanda_phone3')->nullable();
            $table->string('komanda_email')->nullable();
            $table->string('komanda_website')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mediator_products', function (Blueprint $table) {
            //
        });
    }
};
