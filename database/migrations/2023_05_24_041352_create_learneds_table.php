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
        Schema::create('learneds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->unsignedInteger('point');
            $table->boolean('seen');
            $table->boolean('remember');
            $table->dateTime('learned_date');
            $table->string('learnable_type');
            $table->integer('learnable_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learneds');
    }
};
