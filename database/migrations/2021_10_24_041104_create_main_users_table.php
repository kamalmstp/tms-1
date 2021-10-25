<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_type_id');
            $table->string('user_name');
            $table->string('phone');
            $table->string('image');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_users');
    }
}
