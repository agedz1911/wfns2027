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
        Schema::create('c_v_faculties', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('nik')->nullable();
            $table->string('nip')->nullable();
            $table->string('profession');
            $table->string('institution');
            $table->string('city');
            $table->string('country');
            $table->enum('sex', ['Male', 'Female']);
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('highest_education')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            
            $table->text('bio');
            $table->string('photo_path');
            $table->boolean('consent')->default(false);
            $table->timestamp('consented_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_v_faculties');
    }
};
