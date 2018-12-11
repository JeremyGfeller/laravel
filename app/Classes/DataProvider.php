<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 03.12.18
 * Time: 18:02
 */

namespace App\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DataProvider
{
    static function store($data)
    {
        Storage::disk('local')->put('data.txt', serialize($data));
    }

    static function getData()
    {
        //return unserialize(Storage::disk('local')->get('data.txt'));
        return DB::select('SELECT things.id, things.name as tname, things.nbBricks, colors.name as cname FROM things inner join colors on color_id = colors.id;');
    }
}