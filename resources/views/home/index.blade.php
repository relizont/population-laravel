@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Population Information Search</div>
				<div class="panel-body">
				<div class="form-group">
						<div class="col-xs-6 col-md-4">
							<select class="form-control">
								<option>All Country</option>
								@foreach($countries as $country)
								<option value="{{ $country->id }}">{{ $country->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-xs-6 col-md-4">
							<select class="form-control">
								<option>All States/Cities</option>
								@foreach($cities as $city)
								<option value="{{ $city->id }}">{{ $city->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-xs-6 col-md-4">
							<select class="form-control">
								<option>Population</option>
								@foreach($gender as $gender_type)
								<option value="{{ $gender_type->id }}">{{ $gender_type->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">&nbsp;</div>

					<div class="form-group">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Population Type</th>
										<th>Number</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($types as $item)
									<tr> 
										<td>{{ $item->name }}</td>
										<td>1,000,000,000</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>			        	
					</div>

					<div class="form-group">
						<h3>Summary report</h3>
						<div class="table-responsive">
							<table class="table">
								<caption>Three country with highest population</caption>
								<thead>
									<tr>
										<th>SN</th>
										<th>Country Name</th>
										<th>Population</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($population_list as $key => $item)
									<tr> 
										<td>{{ $key+1 }}</td>
										<td>{{ $item->country->name }}</td>
										<td>{{ $item->total }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>			  
					</div>

				</div>
			</div>
		</div>
	</div>   
</div>
@endsection
