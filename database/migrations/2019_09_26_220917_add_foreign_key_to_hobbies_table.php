<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToHobbiesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('hobbies', function (Blueprint $table) {
            $table->string('fk_users');

            $table->foreign('fk_users')->references('email')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('hobbies', function (Blueprint $table) {
            $table->dropForeign('hobbies_email_foreign');
        });
    }
}