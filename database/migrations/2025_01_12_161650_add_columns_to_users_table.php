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
            $table->string('user_name', 100)->after('id'); // Ajout de la colonne user_name
            $table->string('domain', 255)->after('password'); // Ajout de la colonne domain
            $table->string('team', 255)->after('domain'); // Ajout de la colonne team
            $table->enum('specialty', ['doctorant', 'doctorante'])->after('team'); // Ajout de la colonne specialty
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('domain');
            $table->dropColumn('team');
            $table->dropColumn('specialty');
        });
    }
};
