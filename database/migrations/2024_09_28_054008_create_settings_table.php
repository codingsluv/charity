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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('about');
            $table->text('address')->nullable();
            $table->char('postal_code')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('path_image')->nullable();
            $table->string('path_image_header')->nullable();
            $table->string('path_image_footer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
