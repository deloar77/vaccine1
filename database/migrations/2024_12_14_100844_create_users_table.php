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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nid')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('name');
            $table->string('password')->nullable();
            $table->unsignedBigInteger('vaccine_center_id')->nullable();
            $table->enum('status', ['Not scheduled', 'Scheduled', 'Vaccinated'])->default('Not scheduled');
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamps();

            $table->foreign('vaccine_center_id')->references('id')->on('vaccine_centers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
