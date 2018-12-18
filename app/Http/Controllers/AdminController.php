<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use App\Classes\DataProvider;
use App\Classes\Things;
use App\Color;
use App\Http\Requests\CharacterRequest;
use App\Thing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $things = Thing::all();
        $colors = Color::all();
        return view('admin')->with('things', $things)->with('colors', $colors);
    }

    public function delete(Request $delete)
    {
        $things = Thing::find($delete->delid);
        $things->delete();
        $delete->session()->flash('flashmessage', "{$things->name} a bien été supprimée");
        return redirect('admin');
    }

    public function add(CharacterRequest $add)
    {
        $things = new Thing();
        $things->name = $add->nom;
        $things->nbBricks = $add->nbBricks;
        $things->save();
        $things->color()->attach($add->selectColor);
        return redirect('admin');
    }
}