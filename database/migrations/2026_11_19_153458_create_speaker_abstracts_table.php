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
        Schema::create('speaker_abstracts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_other')->nullable();
            $table->string('full_name');
            $table->string('country');
            $table->string('institution');
            $table->string('email');
            $table->json('files'); // [{path, name}]
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
        Schema::dropIfExists('speaker_abstracts');
    }
};
