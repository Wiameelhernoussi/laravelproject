<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name', 100)->after('id'); 
            $table->string('domain', 255)->after('password'); 
            $table->string('team', 255)->after('domain'); 
            $table->enum('specialty', ['doctorant', 'doctorante'])->after('team'); 
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('domain');
            $table->dropColumn('team');
            $table->dropColumn('specialty');
        });
    }
}
?>