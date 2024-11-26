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
        Schema::table('users', function (Blueprint $table) {
          $table->json('user_idcard')->nullable(); //1
          $table->json('user_judge')->nullable(); //2
          $table->json('user_crazy')->nullable(); //3
          $table->json('user_diplom')->nullable(); //4
          $table->json('user_cert_mediator')->nullable(); //5
          $table->json('user_special_cert_mediator')->nullable(); //6
          $table->json('user_mediator_trener')->nullable(); //7
          $table->json('user_registered')->nullable(); //8
          $table->json('user_statute')->nullable(); //9
          $table->json('user_order_head')->nullable(); //10
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
