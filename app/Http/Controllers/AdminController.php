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
        $things = DB::select('SELECT things.id, things.name as tname, things.nbBricks, colors.name as cname FROM things inner join colors on color_id = colors.id;');
        //Storage::disk('local')->put('data.txt', serialize($things));
        return view('admin')->with('things', $things);
    }

    public function delete(Request $delete)
    {
        $id = $delete->delid;
        $things = DataProvider::getData();
        DB::delete('DELETE FROM things.things WHERE id='.$id.'');
        return redirect('admin')->with('data', $things);
    }

    public function add(CharacterRequest $add)
    {
        $things = DataProvider::getData();
        DB::insert('INSERT INTO things (name, nbBricks, color_id) VALUES (\'$add->nom\', \'$add->nbBricks\', \'3\');');
        return redirect('admin')->with('data', $things);
    }
}
