<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_point_id')->nullable();
            $table->foreignId('ammount_id')->nullable();
            $table->foreignId('trip_id')->nullable();
            $table->foreignId('bus_id')->nullable();
            $table->date('date');
            $table->timestamps();
            $table->foreign('collection_point_id')->references('id')->on('collection_points')->onDelete('cascade');
            $table->foreign('ammount_id')->references('id')->on('ammounts')->onDelete('cascade');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_collections');
    }
}
