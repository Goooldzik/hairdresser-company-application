<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_libraries', function (Blueprint $table) {
            $table->id();
            $table->integer('client_library_number');
            $table->text('content');
            $table->timestamps();
        });

        Schema::table('client_libraries', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable()->after('id');
            $table->foreign('client_id')->references('id')->on('clients');

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
        Schema::table('client_libraries', function (Blueprint $table) {
            $table->dropForeign('client_libraries_client_id_foreign');
            $table->dropColumn('client_id');

            $table->dropForeign('client_libraries_hairdresser_id_foreign');
            $table->dropColumn('hairdresser_id');
        });

        Schema::dropIfExists('client_libraries');
    }
}
