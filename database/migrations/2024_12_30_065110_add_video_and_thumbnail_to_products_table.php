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
        Schema::table('products', function (Blueprint $table) {
            $table->string('video_demo')->nullable()->after('description'); // Cột lưu đường dẫn video
            $table->string('thumbnail')->nullable()->after('video_demo'); // Cột lưu đường dẫn ảnh đại diện
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['video_demo', 'thumbnail']);
        });
    }
};
