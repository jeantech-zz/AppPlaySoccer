@section('title', __('Positions'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Result Game Positions </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						
						
					</div>
				</div>
				
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Team </th>
								<th>Country</th>
								<th>Level Positions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($resultGames as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
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