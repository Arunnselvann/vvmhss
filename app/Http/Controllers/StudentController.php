<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Student;



class StudentController extends Controller
{
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        return view('create');
    }

    public function form(Request $req)
    {
        
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:students'
        ]);

        $query =$this->student->insert([
            'student'=>$req->input('name'),
            'email'=>$req->input('email')
        ]);

        if($query){
            return redirect()->route('show')->with('success','Data have been successfully inserted.');
        }else{
            return back()->with('fail','Failed to insert.');
        }

    }
    public function show()
    {
        $lists= $this->student->get();
        return view('create',compact('lists'));
    }

    public function update(Request $request)
    {
        $this->student->where('id',$request->id)->update($request->except(['_token']));
        return back();
    }
    
    public function delete($id)
    {
        $this->student->where('id', $id)->delete();
        return back();

    }

}
