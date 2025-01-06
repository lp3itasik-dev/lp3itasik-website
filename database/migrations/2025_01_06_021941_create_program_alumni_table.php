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
        Schema::create('program_alumni', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->text('photo')->nullable();
            $table->string('name');
            $table->string('school');
            $table->string('work');
            $table->string('profession');
            $table->text('quote');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_alumni');
    }
};
