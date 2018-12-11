<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use App\Classes\DataProvider;
use App\Classes\Things;
use App\Http\Requests\ThingsCaracter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index() {
        $things = DataProvider::getThings();
        $colors = DB::select('select id, name from colors');
        return view('admin')->with('data', $things)->with('colors', $colors);
    }

    public function delete(Request $delete)
    {
        $id = $delete->id;
        $things = DataProvider::getThings();
        DB::delete('delete from things where id = '.$id.'');
        return redirect('admin')->with('data', $things);
    }

    public function add(ThingsCaracter $add)
    {
        $things = DataProvider::getThings();
        DB::insert('INSERT INTO things (name, nbBricks, color_id) VALUES (?, ?, ?)', [$add->nom, $add->nbBrique, $add->selectColor]);
        return redirect('admin')->with('data', $things);
    }
}
