@section('title', __('Result Games'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Result Game Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Result Games">
						</div>
						
					</div>
				</div>
				
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Game Id</th>
								<th>Team Group Id</th>
								<th>Goals For</th>
								<th>Goals Against</th>
								<th>Yellow Cards</th>
								<th>Red Cards</th>
							</tr>
						</thead>
						<tbody>
							@foreach($resultGames as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->game_id }}</td>
								<td>{{ $row->team_name }}</td>
								<td>{{ $row->goals_for }}</td>
								<td>{{ $row->goals_against }}</td>
								<td>{{ $row->yellow_cards }}</td>
								<td>{{ $row->red_cards }}</td>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $resultGames->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>