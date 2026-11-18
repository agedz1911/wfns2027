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
        Schema::create('c_v_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_faculty_id')->constrained('c_v_faculties')->cascadeOnDelete();
            $table->string('period')->nullable();
            $table->string('position')->nullable();
            $table->string('institution')->nullable();
            $table->string('country')->nullable();
            $table->text('relevance')->nullable();
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_v_works');
    }
};
