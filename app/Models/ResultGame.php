<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultGame extends Model
{
    use HasFactory;

    protected $fillable = ['game_id','team_group_id','goals_for','goals_against','yellow_cards','red_cards'];

}
