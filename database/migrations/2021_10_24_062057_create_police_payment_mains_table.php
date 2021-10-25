<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicePaymentMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_payment_mains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_category_id');
            $table->string('sector_name');
            $table->timestamps();
            $table->foreign('expense_category_id')->references('id')->on('expense_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('police_payment_mains');
    }
}
