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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('blog_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('description');
            $table->text('meta_description');
            $table->text('image');
            $table->tinyInteger('status')->default(0)->comment('0 : waiting 1 : confirmed'); // 0 : waiting 1 : confirmed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
