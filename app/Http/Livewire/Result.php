<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ResultGame;

class Result extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $game_id, $team_group_id, $goals_for, $goals_against, $yellow_cards, $red_cards;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.result_games.view', [
            'resultGames' => ResultGame::latest()
						->orWhere('game_id', 'LIKE', $keyWord)
						->orWhere('team_group_id', 'LIKE', $keyWord)
						->orWhere('goals_for', 'LIKE', $keyWord)
						->orWhere('goals_against', 'LIKE', $keyWord)
						->orWhere('yellow_cards', 'LIKE', $keyWord)
						->orWhere('red_cards', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->game_id = null;
		$this->team_group_id = null;
		$this->goals_for = null;
		$this->goals_against = null;
		$this->yellow_cards = null;
		$this->red_cards = null;
    }

    public function store()
    {
        $this->validate([
		'goals_for' => 'required',
		'goals_against' => 'required',
		'yellow_cards' => 'required',
		'red_cards' => 'required',
        ]);

        ResultGame::create([ 
			'game_id' => $this-> game_id,
			'team_group_id' => $this-> team_group_id,
			'goals_for' => $this-> goals_for,
			'goals_against' => $this-> goals_against,
			'yellow_cards' => $this-> yellow_cards,
			'red_cards' => $this-> red_cards
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'ResultGame Successfully created.');
    }

    public function edit($id)
    {
        $record = ResultGame::findOrFail($id);

        $this->selected_id = $id; 
		$this->game_id = $record-> game_id;
		$this->team_group_id = $record-> team_group_id;
		$this->goals_for = $record-> goals_for;
		$this->goals_against = $record-> goals_against;
		$this->yellow_cards = $record-> yellow_cards;
		$this->red_cards = $record-> red_cards;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'goals_for' => 'required',
		'goals_against' => 'required',
		'yellow_cards' => 'required',
		'red_cards' => 'required',
        ]);

        if ($this->selected_id) {
			$record = ResultGame::find($this->selected_id);
            $record->update([ 
			'game_id' => $this-> game_id,
			'team_group_id' => $this-> team_group_id,
			'goals_for' => $this-> goals_for,
			'goals_against' => $this-> goals_against,
			'yellow_cards' => $this-> yellow_cards,
			'red_cards' => $this-> red_cards
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'ResultGame Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = ResultGame::where('id', $id);
            $record->delete();
        }
    }
}
