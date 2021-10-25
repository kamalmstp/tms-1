<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_category_id');
            $table->foreignId('main_sector_id')->nullable();
            $table->foreignId('sub_sector_id')->nullable();
            $table->string('expense_resone');
            $table->integer('ammounts');
            $table->timestamps();
            $table->foreign('expense_category_id')->references('id')->on('expense_categories')->onDelete('cascade');
            $table->foreign('main_sector_id')->references('id')->on('police_payment_mains')->onDelete('cascade');
            $table->foreign('sub_sector_id')->references('id')->on('police_payment_subs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
