<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable(); // e.g. "Training", "Executive Training" 
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('trainer')->nullable();
            $table->string('duration')->nullable();   // e.g. "5 Days"
            $table->string('price')->nullable();      // e.g. "$1,800"
            $table->date('start_date')->nullable();   // If you want to store start date
            $table->string('short_description')->nullable();
            $table->text('long_description')->nullable();
            // Additional fields like "key_topics", "learning_outcomes" can be stored as JSON
            $table->json('key_topics')->nullable();
            $table->json('learning_outcomes')->nullable();

            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
