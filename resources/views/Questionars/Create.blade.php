@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                <h1>Create</h1>
                {!! Form::open(['route'=>'questionars.store','method'=>'post']) !!}

                <div class="form-group {{$errors->has('name')?'has-error':''}}">
                    <div class="row">
                        <div class="col-md-3">Questionar Name</div>
                        <div class="col-md-8">{!! Form::text('name',null, ['class' => 'form-control','placeholder'=>"Enter Questionar "]) !!}
                            <span class="help-block">{{$errors->first("name")}}</span>
                        </div>

                    </div>
                </div>
                <div class="form-group {{$errors->has('duration')?'has-error':''}}">
                    <div class="row">
                        <div class="col-md-3">Duration</div>

                        <div class="col-md-4">{!! Form::text('duration',null, ['class' => 'form-control','placeholder'=>"Enter Duration"]) !!}
                            <span class="help-block">{{$errors->first("duration")}}</span></div>

                        <div class="col-md-3">{!! Form::select('time_unit',['min' => 'Minute', 'hr' => 'Hours'],null, ['class' => 'form-control']) !!}

                            <span class="help-block">{{$errors->first("time_unit")}}</span></div>

                    </div>

                </div>

                <div class="form-group {{$errors->has('resume')?'has-error':''}}">
                    <div class="row">
                        <div class="col-md-3">Can Resume?</div>
                        <div class="col-md-4">
                            <label> Yes {!! Form::radio('resume', 'Yes',['class'=>'form-control']) !!}</label>
                            <label> No {!! Form::radio('resume', 'No',['class'=>'form-control']) !!}</label>
                            <span class="help-block">{{$errors->first("resume")}}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group {{$errors->has('publish')?'has-error':''}}">
                    <div class="row">
                        <div class="col-md-3">Publish?</div>
                        <div class="col-md-4">
                            <label> Yes {!! Form::radio('publish', 'Yes',['class'=>'form-control']) !!}</label>
                            <label> No {!! Form::radio('publish', 'No',['class'=>'form-control']) !!}</label>
                            <span class="help-block">{{$errors->first("resume")}}</span>
                        </div>
                    </div>
                </div>

                <center>
                    {!! Form::submit('Save',['class'=>"btn btn-success"]) !!}

                </center>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
