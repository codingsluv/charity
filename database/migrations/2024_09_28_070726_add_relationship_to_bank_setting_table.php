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
        Schema::table('bank_setting', function (Blueprint $table) {
            $table->foreign('bank_id')
                  ->references('id')
                  ->on('bank')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('setting_id')
                  ->references('id')
                  ->on('settings')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bank_setting', function (Blueprint $table) {
            $table->dropForeign('bank_setting_bank_id_foreign');
            $table->dropForeign('bank_setting_setting_id_foreign');
        });
    }
};
