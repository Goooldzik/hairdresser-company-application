<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHairdressersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairdressers', function (Blueprint $table) {
            $table->id();
            $table->integer('hairdresser_number')->unique();
            $table->string('name');
            $table->string('surname');
            $table->timestamps();
        });

        Schema::table('hairdressers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hairdressers', function (Blueprint $table) {
            $table->dropForeign('hairdressers_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('hairdressers');
    }
}
