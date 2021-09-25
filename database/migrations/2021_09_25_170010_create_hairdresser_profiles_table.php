<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHairdresserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairdresser_profiles', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->text('photo_path')->nullable();
            $table->timestamps();
        });

        Schema::table('hairdresser_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('hairdresser_id')->nullable()->after('id');
            $table->foreign('hairdresser_id')->references('id')->on('hairdressers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hairdresser_profiles', function (Blueprint $table) {
            $table->dropForeign('hairdresser_profiles_hairdresser_id_foreign');
            $table->dropColumn('hairdresser_id');
        });

        Schema::dropIfExists('hairdresser_profiles');
    }
}
