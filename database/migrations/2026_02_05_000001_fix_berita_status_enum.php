<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing 'pending' records to 'review'
        DB::table('berita')
            ->where('status', 'pending')
            ->update(['status' => 'draft']); // Temporary change to draft
            
        // Change ENUM definition
        DB::statement("ALTER TABLE berita MODIFY COLUMN status ENUM('draft', 'review', 'published') NOT NULL DEFAULT 'draft'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Change back to old ENUM
        DB::statement("ALTER TABLE berita MODIFY COLUMN status ENUM('draft', 'pending', 'published') NOT NULL DEFAULT 'pending'");
        
        // Update 'review' records back to 'pending'
        DB::table('berita')
            ->where('status', 'review')
            ->update(['status' => 'pending']);
    }
};
