<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultGamesTable extends Migration
{
    public function up():void
    {
        Schema::create('result_games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->nullable()->constrained('games')->onDelete('cascade');
            $table->foreignId('team_group_id')->nullable()->constrained('team_groups')->onDelete('cascade');
            $table->integer('goals_for');
            $table->integer('goals_against');
            $table->integer('yellow_cards');
            $table->integer('red_cards');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('result_games');
    }
}
