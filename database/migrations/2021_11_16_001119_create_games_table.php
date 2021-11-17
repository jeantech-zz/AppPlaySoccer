<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up():void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_groups_id_A')->constrained('team_groups')->onDelete('cascade');
            $table->foreignId('team_groups_id_B')->nullable()->constrained('team_groups')->onDelete('cascade');
            $table->foreignId('wins')->nullable()->constrained('team_groups')->onDelete('cascade');
            $table->foreignId('losses')->nullable()->constrained('team_groups')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('games');
    }
}
