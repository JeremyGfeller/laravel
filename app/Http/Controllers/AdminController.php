<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use App\Classes\DataProvider;
use App\Classes\Things;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $things = DataProvider::getData();
        Storage::disk('local')->put('data.txt', serialize($things));
        return view('admin')->with('data', $things);
    }

    public function delete(Request $delete)
    {
        $id = $delete->id;
        $things = DataProvider::getData();
        foreach($things as $key=>$thing)
        {
            if($thing->getId() == $id)
            {
                unset($things[$key]);
                Storage::disk('local')->put('data.txt', serialize($things));
                return view('admin')->with('data', $things);
            }
        }
    }

    public function add(Request $add)
    {
        $things = DataProvider::getData();
        $newData = new Things($add->id, $add->nom, $add->nbBrique, $add->couleur);
        array_push($things, $newData);
        Storage::disk('local')->put('data.txt', serialize($things));
        return view('admin')->with('data', $things);
    }
}
