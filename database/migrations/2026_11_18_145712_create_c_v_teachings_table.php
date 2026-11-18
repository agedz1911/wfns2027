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
        Schema::create('c_v_teachings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_faculty_id')->constrained('c_v_faculties')->cascadeOnDelete();
            $table->unsignedSmallInteger('year')->nullable();
            $table->string('event')->nullable();
            $table->string('country')->nullable();
            $table->string('role')->nullable();
            $table->string('topic')->nullable();
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_v_teachings');
    }
};
