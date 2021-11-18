<?php

namespace App\Http\Livewire;

use App\Models\ResultGame;
use App\Repositories\ResultGameRepositories;
use Livewire\Component;
use Livewire\WithPagination;


class Result extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $game_id, $team_group_id, $goals_for, $goals_against, $yellow_cards, $red_cards,$team_name;
    public $updateMode = false;

    private ResultGameRepositories $resultGameRepositories;

    public function __construct(){
        $this->resultGameRepositories = new ResultGameRepositories;
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';

        $resultOrdeBy=$this->resultGameRepositories->allOrderBy($keyWord);

        return view('livewire.result_games.view', [
            'resultGames' => $resultOrdeBy
        
        ]);

       /* return view('livewire.result_games.view', [
            'resultGames' => ResultGame::latest()
						->orWhere('game_id', 'LIKE', $keyWord)
						->orWhere('team_group_id', 'LIKE', $keyWord)
						->orWhere('goals_for', 'LIKE', $keyWord)
						->orWhere('goals_against', 'LIKE', $keyWord)
						->orWhere('yellow_cards', 'LIKE', $keyWord)
						->orWhere('red_cards', 'LIKE', $keyWord)
						->paginate(10),
        ]);*/
    }
	
    
	
}
