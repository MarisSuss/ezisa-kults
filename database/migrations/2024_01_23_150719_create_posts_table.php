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
            $table->integer('likes')->default(0);
            $table->string('slug')->unique();    
            $table->string('image')->nullable();
            $table->boolean('is_pinned')->default(false);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();              
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
