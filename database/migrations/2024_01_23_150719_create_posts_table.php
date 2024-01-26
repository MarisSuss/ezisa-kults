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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title_lv');
            $table->string('title_en');
            $table->text('content_lv');
            $table->text('content_en');
            $table->date('date');
            $table->string('slug');
            $table->foreignId('user_id')->constrained();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->boolean('is_pinned')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
