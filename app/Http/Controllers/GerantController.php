<?php

namespace App\Http\Controllers;
use App\Models\Gerant;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use function Psy\sh;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\SessionGuard;

class GerantController extends Controller
{

    public function profile(Request $request)
    {
        $gerant = Auth::user();
        return view("gerant.profile", compact('gerant'));
    }

    public function editProfile()
    {
        $gerant = Auth::user();
        return view("gerant.editProfile", compact('gerant'));
    }

    public function updateProfile()
    {
        $gerant = Auth::user();

        // Data Validation
        $data = request()->validate([
            'NOM' => 'required',
            'USERNAME' => 'required',
            'TEL' => 'required|min:11|numeric',
            'PAYS' => 'required',
            'VILLE' => 'required',
            'IMG_USER' => ''
        ]);
        if (request('IMG_USER')) {


//            $imagePath = request('IMG_USER')->store("public/uploads");
            $imagePath = request('IMG_USER');
            $filename = date('YmdHi').'.'.$imagePath->getClientOriginalExtension();

            $imagePath->move(public_path('storage/uploads'),$filename);


            // If user had an image delete it
            if($gerant->IMG_USER){
                @unlink(public_path('storage/uploads/') . $gerant->IMG_USER);
            }

            $gerant['IMG_USER'] = $filename;
        }

        $update = $gerant->update($data);
        $gerant->save();
        if($update)
            return redirect("/gerant/profile")->with('success','Profile Updated!');
        else
        {
            return redirect()->route('gerant/profile/edit')->with('error', 'Something went wrong');
        }
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
