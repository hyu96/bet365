<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home_name');
            $table->string('away_name');
            $table->float('home_rate',5,2);
            $table->float('draw_rate',5,2);
            $table->float('away_rate',5,2);
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
            $table->dateTime('time_close_bet');
            $table->dateTime('time_start');
            $table->dateTime('time_end');
            $table->integer('public')->default(0); //0 is hidden, 1 is public
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
        Schema::dropIfExists('matches');
    }
}
