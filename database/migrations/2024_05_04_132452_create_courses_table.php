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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('course_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('create_by')->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->string('summary', 120);
            $table->longText('description');
            $table->text('image');
            $table->decimal('price', 20, 3);
            $table->string('slug')->unique();
            $table->string('short_link')->unique()->nullable();
            $table->tinyInteger('course_level')->default(0)->comment('0 : easy, 1 : normal, 2 : hard, 3 : pro');
            $table->tinyInteger('course_status')->default(0)->comment('0 : comming soon, 1 : recording, 2 : finished');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('comment_able')->default(0);
            $table->text('tags');

            $table->text('meta_keywords');
            $table->text('meta_description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
