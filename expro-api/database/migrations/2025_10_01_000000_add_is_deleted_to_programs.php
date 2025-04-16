<?php
// database/migrations/2023_10_01_000000_add_is_deleted_to_programs.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDeletedToPrograms extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false)->after('learning_outcomes');
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('is_deleted');
        });
    }
}
