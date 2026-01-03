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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable(); // Nullable jika dropdown
            $table->enum('type', ['link', 'dropdown'])->default('link');
            $table->foreignId('parent_id')->nullable()->constrained('menus')->cascadeOnDelete();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('icon')->nullable(); // Optional untuk icon
            $table->boolean('open_new_tab')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
