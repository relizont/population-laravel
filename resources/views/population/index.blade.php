@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Population
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    {!! Form::open(array('url' => 'population','class'=>'form-horizontal')) !!}

                    <div class="form-group">

                      {{ Form::label('country-name', 'Country', array('class' => 'col-sm-3 control-label')) }}

                      <div class="col-sm-6">
                        {{ Form::select('country_id', $countries, null,array('placeholder' => 'Select country','id'=>'country-name','class'=>'form-control')) }}
                      </div>

                    </div>

                    <div class="form-group">

                      {{ Form::label('city-name', 'City', array('class' => 'col-sm-3 control-label')) }}

                      <div class="col-sm-6">
                        {{ Form::select('city_id', $cities, null,array('placeholder' => 'Select city','id'=>'city-name','class'=>'form-control')) }}
                      </div>

                    </div>

                    <div class="form-group">

                      {{ Form::label('type-name', 'Population Type', array('class' => 'col-sm-3 control-label')) }}
                      
                      <div class="col-sm-6">
                        {{ Form::select('type_id', $types, null,array('placeholder' => 'Select Population Type','id'=>'type-name','class'=>'form-control')) }}
                      </div>

                    </div>

                    <div class="form-group">

                      {{ Form::label('gender-name', 'Gender', array('class' => 'col-sm-3 control-label')) }}

                      <div class="col-sm-6">
                        {{ Form::select('gender_id', $gender, null,array('placeholder' => 'Select gender','id'=>'gender-name','class'=>'form-control')) }}
                      </div>

                    </div>

                    <div class="form-group">

                      {{ Form::label('total-name', 'Total', array('class' => 'col-sm-3 control-label')) }}

                      <div class="col-sm-6">
                        {{ Form::number('total',null,array('id'=>'total-name','class'=>'form-control')) }}
                      </div>

                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-6">
                        {{ Form::submit('Add Population',array('class'=>'btn btn-default')) }}
                                {{-- <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add City
                                  </button> --}}
                                </div>
                              </div>

                              {!! Form::close() !!}
                        
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($populations) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Population
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped population-table">
                            <thead>
                                <th>Country</th>
                                <th>City</th>
                                <th>Population Type</th>
                                <th>Gender</th>
                                <th>Total</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($populations as $population)
                                    <tr>
                                        <td class="table-text"><div>{{ $population->country->name }}</div></td>
                                        <td class="table-text"><div>{{ $population->city->name }}</div></td>
                                        <td class="table-text"><div>{{ $population->type->name }}</div></td>
                                        <td class="table-text"><div>{{ $population->gender->name }}</div></td>
                                        <td class="table-text"><div>{{ $population->total }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{url('population/' . $population->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-population-{{ $population->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
