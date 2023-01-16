<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZooController extends Controller
{
    public function enter(Request $request, $id, $a)
    {
        // dump($request);
        
        return 'Versija: '. $request->v.$request->bb .' Labas iš kontrolerio Nr.: ' . $id.$a;
    }

    public function showAnimal($number)
    {
        // $animal = 'Beaver';
        // return view('animals.one', ['showName' => $animal]);
        $list = ['pink', 'crimson', 'green'];

        return view('animals.one', [
            'number' => $number,
            'colors' => $list
        ]);
    }
}
