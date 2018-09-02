<?php

namespace QA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use QA\Question;
use QA\Questionar;

class QuestionarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questionars['questionars']=Questionar::all();
        return view('questionars.index',$questionars);
    }


    public function create()
    {
        return view('questionars.create');
    }


    public function store(Request $request)
    {
        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $this->validate($request, [
            'name' => 'required|max:255',
            'duration' => 'required',
            'time_unit' => 'required',
            'resume' => 'required',
            'publish' => 'required',

        ]);
        $question= new Questionar();
        $question->create($input);
        Session::flash("class","success");
        Session::flash("heading","Success");
        Session::flash("noty","Questionar Has Been Created Successfully");
        return redirect("questionars");

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $questionar['questionar']=Questionar::findOrFail($id);

        return view('questionars.edit',$questionar);
    }


    public function update(Request $request, $id)
    {
        $questionar=Questionar::findOrFail($id);
        $input=$request->all();
        $this->validate($request, [
            'name' => 'required|max:255',
            'duration' => 'required',
            'time_unit' => 'required',
            'resume' => 'required',
            'publish' => 'required',

        ]);
        $questionar->update($input);
        Session::flash("class","success");
        Session::flash("heading","Success");
        Session::flash("noty","Questionar Has Been Updated Successfully");
        return redirect("questionars");
    }


    public function destroy($id)
    {
        $questionar=Questionar::findOrFail($id);
        $question=Question::whereQuestionarId($id);
        $question->delete();
        $questionar->delete();

        Session::flash("class","success");
        Session::flash("heading","Success");
        Session::flash("noty","Questionar Has Been Deleted");
        return redirect("questionars");

    }
}
