<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_groups_id_A')->constrained('team_groups')->onDelete('cascade');
            $table->foreignId('team_groups_id_B')->nullable()->constrained('team_groups')->onDelete('cascade');
            $table->foreignId('ganador')->nullable()->constrained('team_groups')->onDelete('cascade');
            $table->foreignId('perdedor')->nullable()->constrained('team_groups')->onDelete('cascade');
            $table->string('empate')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('games');
    }
}
