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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('display_name')->nullable();
            $table->string('mobile')->unique();
            $table->string('email')->unique()->nullable();
            $table->text('profile')->nullable();
            $table->tinyInteger('user_type')->default(0)->comment('0 : user , 1 : master , 2 : admin');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('ban')->default(0);
            $table->string('password')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
