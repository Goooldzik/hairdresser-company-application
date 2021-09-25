<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->integer('client_library_number')->unique();
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::table('clients', function (Blueprint $table) {
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
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign('clients_hairdresser_id_foreign');
            $table->dropColumn('hairdresser_id');
        });

        Schema::dropIfExists('clients');
    }
}
