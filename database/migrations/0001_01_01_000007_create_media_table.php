<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->boolean('type');
            $table->integer('duration');
            $table->date('release');
            $table->decimal('rating', 3, 1);
            $table->integer('episodes');
            $table->string('preview');
            $table->string('contentURL');
            $table->foreignId('studio_id')->constrained();
            $table->foreignId('age_rating_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
