<?php

namespace App\Http\Livewire;

use App\Models\ResultGame;
use App\Repositories\GameRepositories;
use Livewire\Component;
use Livewire\WithPagination;


class Againsts extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $game_id, $team_name, $team_country, $groups_level ;

    public $updateMode = false;

    private GameRepositories $gameRepositories;

    public function __construct(){
        $this->gameRepositories = new GameRepositories;
    }

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';

        $teamLevelLosses=$this->gameRepositories->teamLevelLosses();

        return view('livewire.team_against.view', [
            'resultGames' => $teamLevelLosses
        
        ]);

    }
}
