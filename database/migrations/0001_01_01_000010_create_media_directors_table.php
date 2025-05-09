<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_directors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('director_id')->constrained();
            $table->foreignId('media_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_directors');
    }
};
