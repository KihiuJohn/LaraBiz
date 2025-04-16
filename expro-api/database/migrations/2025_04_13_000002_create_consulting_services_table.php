<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  class CreateConsultingServicesTable extends Migration
  {
      public function up()
      {
          Schema::create('consulting_services', function (Blueprint $table) {
              $table->id();
              $table->foreignId('parent_id')->nullable()->constrained('consulting_services')->onDelete('cascade');
              $table->string('title');
              $table->string('slug')->unique();
              $table->string('category')->nullable();
              $table->string('image')->nullable();
              $table->text('short_description')->nullable();
              $table->text('long_description')->nullable();
              $table->timestamps();
          });
      }

      public function down()
      {
          Schema::dropIfExists('consulting_services');
      }
  }