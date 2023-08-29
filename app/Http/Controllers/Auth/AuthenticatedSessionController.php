<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }
    public function index() 
    {
        return view('admin.login');
    }
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->input('username');
        $password = $request->input('password');
        $find = User::where('email',$data)->first();
        // if ($request->captcha != session('rand')) 
        // {
        //     return redirect()->back()->with('error','captcha code is Wrong');
        // }
        if(!$find)
        {
            $response = 'Email Does not exist';
            return redirect()->back()->with('error', $response);  
        }
        $pass = $find['password'];
        $hmm = password_verify($password, $pass);
        // dd($hmm);
        if(!$hmm)
        {
            $response = 'Password Is Invalid';
            return redirect()->back()->with('error', $response);  
        }
        if($find->is_active == 0)
        {
            $response = 'Permission Denied! Contact to Administrator';
            return redirect()->back()->with('error', $response);  
        }
        if($find->status == 0)
        {
            $response = 'Permission Denied! Contact to Administrator';
            return redirect()->back()->with('error', $response);  
        }
        // dd($request->password);
        $usreid=$find->id;
        $usrename=$find->name;
        $role = $find->role;
        $status = $find->status;
        
        // $if = $request->authenticate();
        
        $request->session()->regenerate();
        
        $request->session()->put('email',$data);
        $request->session()->put('id',$usreid);
        $request->session()->put('name',$usrename);
        $request->session()->put('role',$role);
        if($role == 2){
            // dd('ojoj');
            $request->session()->put('USER_ID',$usreid);
            $request->session()->put('USER_NAME',$usrename);
        }
        $response = 'Login successfuly';
        return redirect('/dashboard')->with('success', $response);  
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
