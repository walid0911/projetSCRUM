<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ClientController extends Controller
{
    function create(Request $request){
        //Validate Inputs
        $request->validate([
            'NOM'=>'required',
            'USERNAME'=>'required',
            'email'=>'required|email|unique:clients,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
            'TEL'=>'required|min:11|numeric',
            'PAYS'=>'required',
            'VILLE'=>'required'

        ]);

        $client = new Client();
        $client->NOM = $request->NOM;
        $client->USERNAME = $request->USERNAME;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->TEL = $request->TEL;
        $client->PAYS = $request->PAYS;
        $client->VILLE = $request->VILLE;



        $save = $client->save();

        if( $save ){
            return redirect()->back()->with('success','You are now registered successfully');
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
            'email'=>'required|email|exists:clients,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on clients table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('client')->attempt($creds) ){
            return redirect()->route('client.home');
        }else{
            return redirect()->route('client.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('client')->logout();
        return redirect('/');
    }
}
