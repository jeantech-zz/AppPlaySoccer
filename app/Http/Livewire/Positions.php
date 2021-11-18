<?php

namespace App\Http\Livewire;

use App\Models\ResultGame;
use App\Repositories\ResultGameRepositories;
use Livewire\Component;
use Livewire\WithPagination;


class Positions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $team_name, $team_country, $groups_level;
    public $updateMode = false;

    private ResultGameRepositories $resultGameRepositories;

    public function __construct(){
        $this->resultGameRepositories = new ResultGameRepositories;
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';

        $resultOrdeBy=$this->resultGameRepositories->allResultOrderBy($keyWord);

        return view('livewire.positions.view', [
            'resultGames' => $resultOrdeBy
        
        ]);
    }
}
