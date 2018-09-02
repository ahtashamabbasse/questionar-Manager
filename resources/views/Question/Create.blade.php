@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Add Question</h1>
                {!! Form::open(['route'=>'question.store','method'=>'post']) !!}


                <div class="question">
                    <div class="question-content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">Type</div>
                                <div class="col-md-2">{!! Form::select('question_type',['text' => 'text', 'mcq' => 'MCQ'],null, ['class' => 'form-control type']) !!}

                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2">Question</div>
                                <div class="col-md-8">{!! Form::text('title',null, ['class' => 'form-control','placeholder'=>"Enter Question title",]) !!}

                                </div>
                                <a href="" class="deleteQuestion">Delete</a>
                            </div>
                        </div>
                        <div class="textQuestionPanel">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">Answer</div>
                                    <div class="col-md-8">{!! Form::text('answer',null, ['class' => 'form-control answer','placeholder'=>"Enter Answer "]) !!}</div>
                                </div>
                            </div>
                            <hr>
                        </div>


                        <div class="mcqPanel" style="display: none;">
                            <div class="mcq-content">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">Choice 1</div>
                                        <div class="col-md-6">{!! Form::text('choice[]',null, ['class' => 'form-control mcq','placeholder'=>"Enter Choice "]) !!}</div>
                                        <div class="col-md-4">
                                            <label> {!! Form::radio('correct', 'correct',['class'=>'form-control']) !!}
                                                Correct</label>
                                            <a href="" class="deleteMCQ">Delete</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a class="addMCQ">Add MCQ</a>

                        </div>


                    </div>
                </div>


                <a href="" id="addQuestion">Add Question</a>
                <center>
                    {!! Form::submit('Save',['class'=>"btn btn-success"]) !!}

                </center>


                {!! Form::close() !!}

            </div>
        </div>
    </div>
    </div>


@endsection
