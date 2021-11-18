@section('title', __('Result Against'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Abstracts</h4>
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
								<th>Goals For</th>
                                <th>Yellow Cards</th>
                                <th>Red Cards</th>
                                <th>Wins</th>
                                <th>Losses </th>
                            </tr>
						</thead>
						<tbody>
							@foreach($resultGames as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->team_name }}</td>
								<td>{{ $row->team_country }}</td>
                                <td>{{ $row->goals_for }}</td>
                                <td>{{ $row->yellow_cards }}</td>
								<td>{{ $row->red_cards }}</td>
                                <td>{{ $row->wins }}</td>
                                <td>{{ $row->losses  }}</td>
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