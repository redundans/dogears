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
        Schema::create('dog_ear_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_ear_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('dog_ear_id')->references('id')->on('dog_ears')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dog_ear_user');
    }
};
