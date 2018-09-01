@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    @if(Session::has('noty'))
                        <div class="alert alert-{{Session('class')}}">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="">x</i>
                            </button>
                            <strong>{{Session('heading')}}</strong>
                            {{Session("noty")}}
                            <br>
                        </div>
                    @endif
                    <div class="col-md-3"><h1>Questionars</h1></div>
                    <div class="col-md-5">
                        <br>
                        <a href="{{route("questionars.create")}}" class="btn btn-info">Add</a>
                    </div>
                </div>

                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Number of Question</th>
                        <th>Duration</th>
                        <th>Resumeable</th>
                        <th>Publish</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($questionars as $questionar)
                        <tr>
                            <td>{{$questionar->id}}</td>
                            <td>{{$questionar->name}}</td>
                            <td>{{$questionar->id}} | <a href="">Add</a> </td>
                            <td>{{$questionar->duration.$questionar->time_unit}}  </td>
                            <td>{{$questionar->resume}}</td>
                            <td>{{$questionar->publish}}</td>

                            <td>
                                {!! Form::open(["method"=>"DELETE","route"=>["questionars.destroy",$questionar->id]]) !!}
                                <a class="btn btn-info btn-sm" href="{{route('questionars.edit',$questionar->id)}}">Edit</a>
                                {!! Form::submit('Delete',['class'=>"btn btn-danger btn-sm"]) !!}
                                {!! Form::close() !!}




                            </td>
                        </tr>
                        @empty
                            <tr class="bg-info">
                                <td class="text-center" colspan="7"> No Questionars Exist</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
