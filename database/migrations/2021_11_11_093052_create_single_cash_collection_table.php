<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleCashCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_cash_collection', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_point_id')->nullable();
            $table->foreignId('ammount_id')->nullable();
            $table->foreignId('trip_id')->nullable();
            $table->text('bus_id')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
            $table->foreign('collection_point_id')->references('id')->on('collection_points')->onDelete('cascade');
            $table->foreign('ammount_id')->references('id')->on('ammounts')->onDelete('cascade');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('single_cash_collection');
    }
}
