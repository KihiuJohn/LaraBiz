<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Check if table exists, modify it; otherwise, create it
        if (Schema::hasTable('consulting_services')) {
            Schema::table('consulting_services', function (Blueprint $table) {
                // Drop existing columns if they conflict

                // Ensure all required columns exist
                if (!Schema::hasColumn('consulting_services', 'parent_id')) {
                    $table->unsignedBigInteger('parent_id')->nullable()->index()->after('id');
                    $table->foreign('parent_id')->references('id')->on('consulting_services')->onDelete('cascade');
                }
                if (!Schema::hasColumn('consulting_services', 'title')) {
                    $table->string('title')->after('parent_id');
                }
                if (!Schema::hasColumn('consulting_services', 'slug')) {
                    $table->string('slug')->unique()->after('title');
                }
                if (!Schema::hasColumn('consulting_services', 'category')) {
                    $table->string('category')->nullable()->after('slug');
                }
                if (!Schema::hasColumn('consulting_services', 'image')) {
                    $table->string('image')->nullable()->after('category');
                }
                if (!Schema::hasColumn('consulting_services', 'location')) {
                    $table->string('location')->nullable()->after('image');
                }
                if (!Schema::hasColumn('consulting_services', 'trainer')) {
                    $table->string('trainer')->nullable()->after('location');
                }
                if (!Schema::hasColumn('consulting_services', 'duration')) {
                    $table->string('duration')->nullable()->after('trainer');
                }
                if (!Schema::hasColumn('consulting_services', 'price')) {
                    $table->string('price')->nullable()->after('duration');
                }
                if (!Schema::hasColumn('consulting_services', 'start_date')) {
                    $table->date('start_date')->nullable()->after('price');
                }
                if (!Schema::hasColumn('consulting_services', 'short_description')) {
                    $table->string('short_description')->nullable()->after('start_date');
                }
                if (!Schema::hasColumn('consulting_services', 'long_description')) {
                    $table->text('long_description')->nullable()->after('short_description');
                }
                if (!Schema::hasColumn('consulting_services', 'key_topics')) {
                    $table->json('key_topics')->nullable()->after('long_description');
                }
                if (!Schema::hasColumn('consulting_services', 'learning_outcomes')) {
                    $table->json('learning_outcomes')->nullable()->after('key_topics');
                }
                if (!Schema::hasColumn('consulting_services', 'is_deleted')) {
                    $table->boolean('is_deleted')->default(false)->after('learning_outcomes');
                }
                if (!Schema::hasColumn('consulting_services', 'created_at')) {
                    $table->timestamps();
                }
            });
        } else {
            Schema::create('consulting_services', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('parent_id')->nullable()->index();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('category')->nullable();
                $table->string('image')->nullable();
                $table->string('location')->nullable();
                $table->string('trainer')->nullable();
                $table->string('duration')->nullable();
                $table->string('price')->nullable();
                $table->date('start_date')->nullable();
                $table->string('short_description')->nullable();
                $table->text('long_description')->nullable();
                $table->json('key_topics')->nullable();
                $table->json('learning_outcomes')->nullable();
                $table->boolean('is_deleted')->default(false);
                $table->timestamps();

                $table->foreign('parent_id')->references('id')->on('consulting_services')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('consulting_services');
    }
};