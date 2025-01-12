<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDuplicateColumnsFromUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('domaine');
            $table->dropColumn('specialite');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('domaine', 255)->nullable();
            $table->string('specialite', 255)->nullable();
        });
    }
}
?>