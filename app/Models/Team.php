<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'teams';

    protected $fillable = ['name','country','image'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany('App\Models\Player', 'team_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamGroups()
    {
        return $this->hasMany('App\Models\TeamGroup', 'team_id', 'id');
    }
    
}
