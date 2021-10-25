<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicePaymentSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_payment_subs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_sector_id');
            $table->string('sub_sector_name');
            $table->string('phone');
            $table->timestamps();
            $table->foreign('main_sector_id')->references('id')->on('police_payment_mains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('police_payment_subs');
    }
}
