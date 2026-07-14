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
        Schema::create('news', function (Blueprint $table) {

    $table->id();

    $table->foreignId('category_id')->constrained()->cascadeOnDelete();

    $table->string('title');

    $table->string('slug')->unique();

    $table->string('image')->nullable();

    $table->longText('description');

    $table->boolean('status')->default(1);

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
