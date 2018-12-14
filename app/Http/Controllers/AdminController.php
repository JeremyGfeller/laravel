<?php

namespace App\Http\Controllers;

use App\Classes\Character;
use App\Classes\DataProvider;
use App\Classes\Things;
use App\Http\Requests\CharacterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class AdminController extends Controller
{
    public function index() {
        // query builder -> random, recupération ID,

        /*$things = DB::table('things')
            ->select('things.id', 'things.name as tname', 'things.nbBricks', 'colors.name as cname')
            ->join('colors', 'color_id', '=', 'colors.id')
            ->get();*/

        $things = DB::select('SELECT things.id, things.name as tname, things.nbBricks, colors.name as cname FROM things inner join colors on color_id = colors.id;');
        $colors = DB::select('SELECT id, name FROM colors');
        return view('admin')->with('things', $things)->with('colors', $colors);
    }

    public function delete(Request $delete)
    {
        $id = $delete->delid;
        DataProvider::delete($id);

        $things = DataProvider::getData();
        return redirect('admin')->with('data', $things);
    }

    public function add(CharacterRequest $add)
    {
        DataProvider::add($add->nom, $add->nbBricks, $add->selectColor);
        $things = DataProvider::getData();
        return redirect('admin')->with('data', $things);
    }
}
