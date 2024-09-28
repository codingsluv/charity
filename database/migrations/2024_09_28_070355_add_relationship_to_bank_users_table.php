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
        Schema::table('bank_users', function (Blueprint $table) {
            $table->foreign('bank_id')
                    ->references('id')
                    ->on('bank')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
             $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bank_users', function (Blueprint $table) {
            $table->dropForeign('bank_users_bank_id_foreign');
            $table->dropForeign('bank_users_user_id_foreign');
        });
    }
};
