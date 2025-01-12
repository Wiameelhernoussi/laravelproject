<?php
// filepath: /C:/xampp/htdocs/laravel/my-project/database/migrations/2025_01_12_004542_drop_users_table.php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUsersTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('users');
    }

    public function down()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('domain', 255);
            $table->string('team', 255);
            $table->enum('specialty', ['doctorant', 'doctorante']);
            $table->timestamps();
        });
    }
}