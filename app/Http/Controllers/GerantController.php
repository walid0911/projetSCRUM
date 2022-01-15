<?php

namespace App\Http\Controllers;

use App\Models\Gerant;
use Illuminate\Http\Request;
use function Psy\sh;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GerantController extends Controller
{

    public function profile()
    {
        //should be something like: $gerant = Auth::user();
        $gerant = Gerant::find(1);
        return view("gerant.profile", compact('gerant'));
    }

    public function editProfile()
    {
        //should be something like: $gerant = Auth::user();
        $gerant = Gerant::find(1);
        return view("gerant.editProfile", compact('gerant'));
    }

    public function updateProfile()
    {
        $gerant = Gerant::find(1);

        $this->authorize('update', $gerant);

        $data = request()->validate([
            'NOM' => 'required',
            'USERNAME' => 'required',
            'TEL' => 'required|min:11|numeric',
            'PAYS' => 'required',
            'VILLE' => 'required'
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        $gerant->update(array_merge($data, $imageArray));
        return view("hihi");
    }
    function create(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'NOM' => 'required',
            'USERNAME' => 'required',
            'email' => 'required|email|unique:gerants,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
            'TEL' => 'required|min:11|numeric',
            'PAYS' => 'required',
            'VILLE' => 'required'

        ]);

        $gerant = new Gerant();
        $gerant->NOM = $request->NOM;
        $gerant->USERNAME = $request->USERNAME;
        $gerant->email = $request->email;
        $gerant->password = Hash::make($request->password);
        $gerant->TEL = $request->TEL;
        $gerant->PAYS = $request->PAYS;
        $gerant->VILLE = $request->VILLE;


        $save = $gerant->save();

        if ($save) {
            return redirect()->back()->with('success', 'You are now registered successfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    function check(Request $request)
    {
        //Validate inputs
        $request->validate([
            'email' => 'required|email|exists:gerants,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists on gerants table'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('gerant')->attempt($creds)) {
            return redirect()->route('gerant.home');
        } else {
            return redirect()->route('gerant.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('gerant')->logout();
        return redirect('/');
    }

}
