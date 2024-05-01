<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\student;

class StudentController extends Controller
{
    public function userRegister(Request $request){
       
            $request->validate([
                'name'=>'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:students',
                'password' => 'required|string|min:5',
            ]);
            $student = new student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $result = $student->save();
            if($result){
                return redirect('/login')->with('success','User registered successfully');
            }else{
                return back()->with('fail','Something Worng');
            }
            return redirect('/login');
    }
    public function userLogin(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);
        $result = new student;
        $result = $result->where('email','=',$request->email)->first();
        if($result){
            if(Hash::check($request->password,$result->password)){
                $request->session()->put('loginId',$result->id);
                return redirect('dashboard')->with('success','User logged in successfully');
            }else{
                return back()->with('fail','password not matches');
            }
        }else{
            return back()->with('fail','This email is not registered');
        }
        
    }
    public function logIn(Request $request){
         return view('login');
    }
    public function logOut(Request $request){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return view('login');
        }
    }
} 
