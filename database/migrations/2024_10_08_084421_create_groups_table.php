<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('cover_path')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->boolean('auto_approve')->default(true);
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('about')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('deleted_by')->constrained('users');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};