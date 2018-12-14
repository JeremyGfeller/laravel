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
    static function getData()
    {
        return DB::select('SELECT things.id, things.name as tname, things.nbBricks, colors.name as cname FROM things inner join colors on color_id = colors.id;');
    }

    static function delete($id)
    {
        DB::delete('DELETE FROM things.things WHERE id= :id', ['id' => $id]);
    }

    static function add($name, $nbBricks, $color)
    {
        DB::insert('INSERT INTO things (name, nbBricks, color_id) VALUES (:name, :nbBricks, :color)', ['name' => $name, 'nbBricks' => $nbBricks, 'color' => $color]);
    }
}