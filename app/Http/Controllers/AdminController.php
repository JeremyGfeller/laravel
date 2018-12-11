<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use App\Classes\DataProvider;
use App\Classes\Things;
use App\Http\Requests\CharacterRequest;
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
        $id = $delete->delid;
        $things = DataProvider::getData();
        foreach($things as $key=>$thing)
        {
            if($thing->getId() == $id)
            {
                unset($things[$key]);
                Storage::disk('local')->put('data.txt', serialize($things));
                return redirect('admin')->with('data', $things);
            }
        }
    }

    public function add(CharacterRequest $add)
    {
        $things = DataProvider::getData();
        $nextId = 0;
        foreach($things as $thing)
        {
            if($thing->getId() > $nextId)
            {
                $nextId = $thing->getId();
            }
        }
        $nextId++;
        $newData = new Things($nextId, $add->nom);
        array_push($things, $newData);
        DataProvider::store($things);
        return redirect('admin')->with('data', $things);
    }
}
