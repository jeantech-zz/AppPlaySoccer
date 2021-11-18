<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalLoad" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Player</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
           <form wire:submit.prevent="save"
           enctype="multipart/form-data"
           >
            <input type="file" wire:model="load">  @error('load') <span class="error">{{ $message }}</span> @enderror
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="load()" class="btn btn-primary close-modal">Load</button>
            </div>
        </div>
    </div>
</div>