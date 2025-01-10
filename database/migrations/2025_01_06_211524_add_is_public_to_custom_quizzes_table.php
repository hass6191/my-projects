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
        Schema::table('custom_quizzes', function (Blueprint $table) {
            $table->boolean('is_public')->default(false); // Default to private
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('custom_quizzes', function (Blueprint $table) {
            $table->dropColumn('is_public');
        });
    }
};
