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
        Schema::create('course_episodes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('course_id')->constrained('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sesson_id')->constrained('course_sessons')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('create_by')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->text('file_path');
            $table->bigInteger('file_size');
            $table->string('file_type');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_episodes');
    }
};
