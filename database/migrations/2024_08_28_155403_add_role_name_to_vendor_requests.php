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
        Schema::table('vendor_requests', function (Blueprint $table) {
            $table->string('role_name')->after('user_id');
        });
    }
    
    public function down()
    {
        Schema::table('vendor_requests', function (Blueprint $table) {
            $table->dropColumn('role_name');
        });
    }
    
};
