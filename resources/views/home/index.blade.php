@extends('layouts.app')

@section('content')
<div class="container" ng-app="populationApp" ng-controller="populationController">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Population Information Search</div>
				<div class="panel-body">
				<div class="form-group">
						<div class="col-sm-6 col-md-4">
							<select class="form-control" ng-model="selectedCountryId" data-ng-options='value.country.id as (value.country.name + " (" + value.sum + ") " ) for value in countryOptions' ng-change="getCityPopulationListByCountry(selectedCountryId)">
								<option value="">Select Country</option>
								 {{-- <option ng-repeat="country in populationData.countries" value="<% country.id %>"><% country.name %></option> --}}
								{{-- @foreach($countries as $country)
								<option value="{{ $country->id }}">{{ $country->name }}</option>
								@endforeach --}}
							</select>
						</div>
						<div class="col-sm-6 col-md-4">
							<select class="form-control" ng-model="selectedCityId" data-ng-options='value.city.id as (value.city.name + " (" + value.sum + ") " ) for value in cityOptions' ng-change="getGenderPopulationByCity(selectedCityId)">
								<option value="">All Cities/States</option>
								{{-- <option ng-repeat="city in populationData.cities" value="<% city.id %>"><% city.name %></option> --}}
								{{-- @foreach($cities as $city)
								<option value="{{ $city->id }}">{{ $city->name }}</option>
								@endforeach --}}
							</select>
						</div>
						<div class="col-sm-6 col-md-4">
							<select class="form-control" ng-model="selectedGenderId" data-ng-options='value.gender.id as (value.gender.name + " (" + value.sum + ") " ) for value in genderOptions' ng-change="listPopulationType(selectedGenderId)">
								<option value="">Population</option>
								{{-- <option ng-repeat="item in populationData.gender" value="<% item.id %>"><% item.name %></option> --}}
								{{-- @foreach($gender as $gender_type)
								<option value="{{ $gender_type->id }}">{{ $gender_type->name }}</option>
								@endforeach --}}
							</select>
						</div>
					</div>
					<div class="form-group">&nbsp;</div>

					<div class="form-group" ng-show="showPopulationList">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Population Type</th>
										<th>Number</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="item in populationTypeList">
										<td><% item.type.name %></td>
										<td><% item.sum %></td>
									</tr>
									{{-- @foreach ($types as $item)
									<tr>
										<td>{{ $item->name }}</td>
										<td>1,000,000,000</td>
									</tr>
									@endforeach --}}
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
									<tr ng-repeat="(key,item) in populationData.population_list">
										<td><% key+1 %></td>
										<td><% item.country.name %></td>
										<td><% item.sum %></td>
									</tr>
									{{-- @foreach ($population_list as $key => $item)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $item->country->name }}</td>
										<td>{{ $item->total }}</td>
									</tr>
									@endforeach --}}
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
