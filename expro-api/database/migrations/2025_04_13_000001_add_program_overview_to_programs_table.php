<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->text('program_overview')->nullable()->after('long_description');
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('program_overview');
        });
    }
};