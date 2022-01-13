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

        return view("profileGerant", compact('gerant'));
    }
}
