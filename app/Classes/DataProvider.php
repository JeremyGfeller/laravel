<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 03.12.18
 * Time: 18:02
 */

namespace App\Classes;


use Illuminate\Support\Facades\Storage;

class DataProvider
{
    static function getData()
    {
        return unserialize(Storage::disk('local')->get('data.txt'));
    }
}