<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('age_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('age');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('age_ratings');
    }
};
