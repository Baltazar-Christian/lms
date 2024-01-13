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
        Schema::table('notification_user', function (Blueprint $table) {
            $table->boolean('seen')->default(false);
        });
    }

    public function down()
    {
        Schema::table('notification_user', function (Blueprint $table) {
            $table->dropColumn('seen');
        });
    }
};
