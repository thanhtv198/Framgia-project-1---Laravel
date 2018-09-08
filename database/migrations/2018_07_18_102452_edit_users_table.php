<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('remove')->default(0)->after('name');
            $table->string('phone_number')->after('name');
            $table->date('birthday')->after('name');
            $table->string('address')->after('name');
            $table->integer('level_id')->unsigned()->after('name');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->integer('local_id')->unsigned()->after('name');
            $table->foreign('local_id')->references('id')->on('locals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
