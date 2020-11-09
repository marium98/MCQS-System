<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Validator,Redirect,Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index(){
        return view('adminlogin');
    }

    public function adminReg(){
        return view('adminreg');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/insert');
        }
        return back()->withInput($request->only('email', 'remember'));
        // $request->validate([
        //         'email' => 'required',
        //         'password' => 'required',
        //         ]);
         
        //         $credentials = $request->only('email', 'password');
        //         if (Auth()->attempt($credentials)) {
        //             // Authentication passed...
        //             return redirect()->route('insert');
        //         }
        //         return Redirect::to("adminlogin")->withSuccess('Oppes! You have entered invalid credentials');

    }

    public function adminRegistration(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            ]);
             
            $user = Admin::create([
                'name' => trim($request->input('name')),
                'email' => strtolower($request->input('email')),
                'password' => bcrypt($request->input('password')),
            ]);
    
            session()->flash('message', 'Your account is created');
           
            return redirect()->route('adminlogin');
    }

   

    // public function create(array $data)
    // {
    //   return Admin::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }

     public function adminLogout() {
        Session::flush();
        Auth::logout();
        return Redirect('adminlogin');
    }
}
