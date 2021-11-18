<?php

namespace App\Http\Livewire;

use App\Imports\TeamsImport;
use App\Http\Controllers\GenerateGameController;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;


class Teams extends Component
{
    use WithPagination;
    use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $country, $image;
    public $updateMode = false;
    public $load;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.teams.view', [
            'teams' => Team::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('country', 'LIKE', $keyWord)
						->orWhere('image', 'LIKE', $keyWord)
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
		$this->country = null;
		$this->image = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'country' => 'required',
		'image' => 'required',
        ]);

        Team::create([ 
			'name' => $this-> name,
			'country' => $this-> country,
			'image' => $this-> image
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Team Successfully created.');
    }

    public function edit($id)
    {
        $record = Team::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->country = $record-> country;
		$this->image = $record-> image;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'country' => 'required',
		'image' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Team::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'country' => $this-> country,
			'image' => $this-> image
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Team Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Team::where('id', $id);
            $record->delete();
        }
    }

    public function load()
    {
        $file= $this->validate([
            'load' => 'max:1024', // 1MB Max
        ]);

        $csvFileName=$this->load->store('public');

        $teamImport=Excel::import(new TeamsImport, $csvFileName);

        foreach ($teamImport as $team) {
            Team::create([ 
                'name' => $team-> name,
                'country' => $team-> country,
                'image' => $team-> image
            ]);
        }

        $this->emit('closeModal');
		session()->flash('message', 'Team Successfully created.');
    }

    public function generate ($level){

        $generate = new GenerateGameController;
        $generateGame= $generate->generate($level);

    }
    
}
