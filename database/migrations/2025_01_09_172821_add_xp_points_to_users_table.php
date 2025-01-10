<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('xp_points')->default(0)->after('password'); // Add `xp_points` column with a default value of 0
            $table->integer('xp_level')->default(1)->after('xp_points'); // Add `xp_level` column with a default value of 1
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['xp_points', 'xp_level']);
        });
    }
};
