<?php

namespace App\Http\Controllers;

use App\Models\Gerant;
use Illuminate\Http\Request;
use function Psy\sh;

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
}
