<?php

namespace App\Http\Livewire;

use App\Models\ResultGame;
use App\Repositories\TeamRepositories;
use Livewire\Component;
use Livewire\WithPagination;

class Abstracts extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $team_name, $team_country, $goals_for, $yellow_cards, $red_cards, $wins, $losses ;

    public $updateMode = false;

    private TeamRepositories $teamRepositories;

    public function __construct(){
        $this->teamRepositories = new TeamRepositories;
    }

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';

        $allGameResult=$this->teamRepositories->allGameResult();

        return view('livewire.abstracts.view', [
            'resultGames' => $allGameResult        
        ]);

    }
}
