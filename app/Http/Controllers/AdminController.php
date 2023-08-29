<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function userList()
    {
        $data['users'] = User::where('role', 1)->where('status', 1)->get();
        return view('admin.user-list', $data);
    }
    public function addUser()
    {
        return view('admin.add-user');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'user_key' => $request->password,
        ]);
        return redirect()->back()->with('success', 'Employees add successfuly');
    }
    public function userActive($id)
    {
        $find = User::find($id);
        if($find->is_active == 1)
        {
            $find->is_active = 0;
            $find->save();
            $msg = 'employees de-activate successfully';
        }
        else
        {
            $find->is_active = 1;
            $find->save();
            $msg = 'employees activate successfully';
        }
        return redirect('/user-list')->with('success', $msg);
    }
    public function userDelete($id)
    {
        $find = User::find($id);
        $find->status = 0;
        $find->save();
        $msg = 'employees deleted successfully';
        return redirect('/user-list')->with('success', $msg);
    }
    public function userEdit($id)
    {
        $data['user'] = User::find($id);
        return view('admin.user-edit', $data);
    }
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->user_key = $request->password;
        $user->save();
        return redirect()->back()->with('success', 'User update successfuly');
    }
}
