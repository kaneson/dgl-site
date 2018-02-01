<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContendingTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contending_team', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('clan_id');
            $table->unsignedInteger('tournament_id');

            $table->foreign('clan_id')->references('id')->on('clans');
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            
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
        Schema::dropIfExists('contending_team');
    }
}
