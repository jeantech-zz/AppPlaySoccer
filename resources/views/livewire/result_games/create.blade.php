<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Result Game</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="game_id"></label>
                <input wire:model="game_id" type="text" class="form-control" id="game_id" placeholder="Game Id">@error('game_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="team_group_id"></label>
                <input wire:model="team_group_id" type="text" class="form-control" id="team_group_id" placeholder="Team Group Id">@error('team_group_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="goals_for"></label>
                <input wire:model="goals_for" type="text" class="form-control" id="goals_for" placeholder="Goals For">@error('goals_for') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="goals_against"></label>
                <input wire:model="goals_against" type="text" class="form-control" id="goals_against" placeholder="Goals Against">@error('goals_against') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="yellow_cards"></label>
                <input wire:model="yellow_cards" type="text" class="form-control" id="yellow_cards" placeholder="Yellow Cards">@error('yellow_cards') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="red_cards"></label>
                <input wire:model="red_cards" type="text" class="form-control" id="red_cards" placeholder="Red Cards">@error('red_cards') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>