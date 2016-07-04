@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cities
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    {!! Form::open(array('url' => 'city','class'=>'form-horizontal')) !!}

                    <!-- Task Name -->
                        <div class="form-group">

                          {{ Form::label('city-name', 'City', array('class' => 'col-sm-3 control-label')) }}
                          
                          <div class="col-sm-6">
                          {{ Form::text('name',null,array('id'=>'city-name','class'=>'form-control')) }}
                          </div>

                        </div>

                        <div class="form-group">

                          {{ Form::label('country-name', 'Country', array('class' => 'col-sm-3 control-label')) }}
                          
                          <div class="col-sm-6">
                          {{ Form::select('country_id', $countries, null,array('placeholder' => 'Select country','id'=>'country-name','class'=>'form-control')) }}
                          </div>

                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                {{ Form::submit('Add City',array('class'=>'btn btn-default')) }}
                                {{-- <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add City
                                </button> --}}
                            </div>
                        </div>
    
                    {!! Form::close() !!}
                        
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($cities) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current City
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped city-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr>
                                        <td class="table-text"><div>{{ $city->name }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{url('city/' . $city->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-city-{{ $city->id }}" class="btn btn-danger">
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
