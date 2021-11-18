<?php

namespace App\Http\Livewire;

use App\Models\Player;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PlayersImport;


class Players extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $nationality, $age, $position, $shirt_number, $image, $team_id;
    public $updateMode = false;
	public $load;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.players.view', [
            'players' => Player::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('nationality', 'LIKE', $keyWord)
						->orWhere('age', 'LIKE', $keyWord)
						->orWhere('position', 'LIKE', $keyWord)
						->orWhere('shirt_number', 'LIKE', $keyWord)
						->orWhere('image', 'LIKE', $keyWord)
						->orWhere('team_id', 'LIKE', $keyWord)
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
		$this->name = null;
		$this->nationality = null;
		$this->age = null;
		$this->position = null;
		$this->shirt_number = null;
		$this->image = null;
		$this->team_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'nationality' => 'required',
		'age' => 'required',
		'position' => 'required',
		'shirt_number' => 'required',
		'image' => 'required',
		'team_id' => 'required',
        ]);

        Player::create([ 
			'name' => $this-> name,
			'nationality' => $this-> nationality,
			'age' => $this-> age,
			'position' => $this-> position,
			'shirt_number' => $this-> shirt_number,
			'image' => $this-> image,
			'team_id' => $this-> team_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Player Successfully created.');
    }

    public function edit($id)
    {
        $record = Player::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->nationality = $record-> nationality;
		$this->age = $record-> age;
		$this->position = $record-> position;
		$this->shirt_number = $record-> shirt_number;
		$this->image = $record-> image;
		$this->team_id = $record-> team_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'nationality' => 'required',
		'age' => 'required',
		'position' => 'required',
		'shirt_number' => 'required',
		'image' => 'required',
		'team_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Player::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'nationality' => $this-> nationality,
			'age' => $this-> age,
			'position' => $this-> position,
			'shirt_number' => $this-> shirt_number,
			'image' => $this-> image,
			'team_id' => $this-> team_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Player Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Player::where('id', $id);
            $record->delete();
        }
    }

	public function load()
    {
        $file= $this->validate([
            'load' => 'max:1024', // 1MB Max
        ]);

        $csvFileName=$this->load->store('public');

        $playerImport=Excel::import(new PlayersImport, $csvFileName);

		$team_id=1;
        foreach ($playerImport as $player) {   
			$team_id=1;        
			Player::create([ 
				'name' => $player->name,
				'nationality' => $player->nationality,
				'age' => $player->age,
				'position' => $player->position,
				'shirt_number' => $player->shirt_number,
				'image' => $player->image,
				'team_id' => $player->position
			]);
        }

        $this->emit('closeModal');
		session()->flash('message', 'Player Successfully created.');
    }
}
