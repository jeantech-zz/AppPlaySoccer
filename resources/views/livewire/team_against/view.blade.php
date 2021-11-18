@section('title', __('Result Against'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Result Game Against </h4>
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
								<th>Team </th>
								<th>Country</th>
								<th>Level Against</th>
							</tr>
						</thead>
						<tbody>
							@foreach($resultGames as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->game_id }}</td>
								<td>{{ $row->team_name }}</td>
								<td>{{ $row->team_country }}</td>
								<td>{{ $row->groups_level }}</td>
					
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