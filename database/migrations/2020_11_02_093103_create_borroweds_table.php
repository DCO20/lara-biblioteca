<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borroweds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('studant_id');
            $table->unsignedBigInteger('libro_id');
            $table->date('token_borrowed');
            $table->date('token_returned');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('studant_id')->references('id')->on('studants');
            $table->foreign('libro_id')->references('id')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borroweds');
    }
}
