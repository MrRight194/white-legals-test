<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function clientList()
    {
        $data['clients'] = Client::where('status', 1)->get();
        return view('admin.client-list', $data);
    }
    public function addClient()
    {
        return view('admin.add-client');
    }
    public function storeClient(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'notes' => ['required'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
        ]);
        $creater = session('id');
        $client = new Client();
        $client->name = $request->name;
        $client->notes = $request->notes;
        $client->city = $request->city;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->created_by = $creater;
        $client->save();
        return redirect()->back()->with('success', 'Client add successfuly');
    }
    public function clientDelete($id)
    {
        $find = Client::find($id);
        $find->status = 0;
        $find->save();
        $msg = 'Client deleted successfully';
        return redirect('/client-list')->with('success', $msg);
    }
    public function clientEdit($id)
    {
        $data['client'] = Client::find($id);
        return view('admin.client-edit', $data);
    }
    public function updateClient(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'notes' => ['required'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $creater = session('id');
        $client = Client::find($id);
        $client->name = $request->name;
        $client->notes = $request->notes;
        $client->city = $request->city;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->updated_by = $creater;
        $client->save();
        return redirect()->back()->with('success', 'Client update successfuly');
    }
}
