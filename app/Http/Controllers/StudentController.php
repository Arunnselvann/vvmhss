<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Student;



class StudentController extends Controller
{
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

        $query = DB::table('students')->insert([
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
        $lists= DB::table('students')->get();
        return view('create',compact('lists'));
    }

    public function update(Request $request)
    {
        $update = Student::where('id',$request->id)->update($request->except(['_token']));
        return back();
    }
    
    public function delete($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return back();

    }


    
   
}
