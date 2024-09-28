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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->longText('body');
            $table->integer('view_count');
            $table->enum('status', ["public", "pending", "archived"])
                        ->default('pending');
            $table->integer('nominal');
            $table->integer('goals');
            $table->dateTime('end_date');
            $table->text('note')->nullable();
            $table->string('receiver');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
