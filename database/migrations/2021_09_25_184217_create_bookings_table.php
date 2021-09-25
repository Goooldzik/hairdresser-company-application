<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->timestamp('visit_at');
            $table->timestamps();
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('hairdresser_id')->nullable()->after('id');
            $table->foreign('hairdresser_id')->references('id')->on('hairdressers');

            $table->unsignedBigInteger('client_id')->nullable()->after('id');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('bookings_hairdresser_id_foreign');
            $table->dropColumn('hairdresser_id');

            $table->dropForeign('bookings_client_id_foreign');
            $table->dropColumn('client_id');
        });

        Schema::dropIfExists('bookings');
    }
}
