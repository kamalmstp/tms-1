<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ammounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_point_id');
            $table->integer('ammounts');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('collection_point_id')->references('id')->on('collection_points')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ammounts');
    }
}
