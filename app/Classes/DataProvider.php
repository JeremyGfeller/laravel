<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 03.12.18
 * Time: 18:02
 */

namespace App\Classes;

use Illuminate\Support\Facades\DB;

class DataProvider
{
    static function getThings()
    {
        return DB::select('select t.id as tid, t.name as tname, t.nbBricks as nbBricks, c.name as cname from things t inner join colors c on t.color_id = c.id');
    }
}