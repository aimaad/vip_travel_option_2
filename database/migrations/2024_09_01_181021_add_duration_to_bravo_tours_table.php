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
        Schema::table('bravo_tours', function (Blueprint $table) {
            $table->integer('duration')->nullable(); // Add the 'duration' column
        });
    }
    
    public function down()
    {
        Schema::table('bravo_tours', function (Blueprint $table) {
            $table->dropColumn('duration'); // Rollback: remove the 'duration' column
        });
    }
    
};
