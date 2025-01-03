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
            $table->string('link_access')->nullable()->after('name');
            $table->string('link_faq')->nullable()->after('link_access');
            $table->string('link_call')->nullable()->after('link_faq');
            $table->string('link_download')->nullable()->after('link_call');
            $table->string('link_pricing')->nullable()->after('link_download');
            $table->string('link_review')->nullable()->after('link_pricing');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'link_access',
                'link_faq',
                'link_call',
                'link_download',
                'link_pricing',
                'link_review',
                'deleted_at'
            ]);
        });
    }
};
