<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('dni')->unique()->after('id');
            $table->string('phone')->after('email');
            $table->string('address')->after('phone');
            $table->string('photo')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('dni');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('photo');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
};
