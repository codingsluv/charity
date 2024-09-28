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
        Schema::table('category_campaign', function (Blueprint $table) {
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            $table->foreign('campaign_id')
                    ->references('id')
                    ->on('campaigns')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_campaign', function (Blueprint $table) {
            $table->dropForeign('category_campaign_category_id_foreign');
            $table->dropForeign('category_campaign_campaign_id_foreign');
        });
    }
};
