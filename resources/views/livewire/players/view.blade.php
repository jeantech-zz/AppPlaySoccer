@section('title', __('Players'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Player Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Players">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Add Players
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalLoad">
						<i class="fa fa-plus"></i>  Load Players
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.players.create')
						@include('livewire.players.update')
						@include('livewire.players.load')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Nationality</th>
								<th>Age</th>
								<th>Position</th>
								<th>Shirt Number</th>
								<th>Image</th>
								<th>Team Id</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($players as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->nationality }}</td>
								<td>{{ $row->age }}</td>
								<td>{{ $row->position }}</td>
								<td>{{ $row->shirt_number }}</td>
								<td>{{ $row->image }}</td>
								<td>{{ $row->team_id }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Player id {{$row->id}}? \nDeleted Players cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $players->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>