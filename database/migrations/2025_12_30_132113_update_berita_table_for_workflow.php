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
        Schema::table('berita', function (Blueprint $table) {
            // Change status column from simple enum to workflow enum  
            $table->enum('status', ['draft', 'pending', 'published'])
                  ->default('pending')
                  ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            // Revert status back to original
            $table->enum('status', ['draft', 'published'])
                  ->default('draft')
                  ->change();
        });
    }
};
