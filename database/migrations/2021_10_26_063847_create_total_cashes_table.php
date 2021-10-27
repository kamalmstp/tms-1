<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_cashes', function (Blueprint $table) {
            $table->id();
            $table->integer('ds_ammount')->nullable();
            $table->integer('saydabad_ammount')->nullable();
            $table->integer('gp_ammount')->nullable();
            $table->integer('minus_gp_ammount')->nullable();
            $table->integer('after_minus_gp_ammount')->nullable();
            $table->integer('total_ammount')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_cashes');
    }
}
