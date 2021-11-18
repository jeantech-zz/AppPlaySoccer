<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultGame extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'result_games';

    protected $fillable = ['game_id','team_group_id','goals_for','goals_against','yellow_cards','red_cards'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function game()
    {
        return $this->hasOne('App\Models\Game', 'id', 'game_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teamGroup()
    {
        return $this->hasOne('App\Models\TeamGroup', 'id', 'team_group_id');
    }
    
}
