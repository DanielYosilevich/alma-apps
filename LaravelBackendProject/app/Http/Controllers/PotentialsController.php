<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PotentialsController extends Controller
{
    public function show(Request $request)
    {
        $postbody = $request->all();
        $interval = $postbody['interval'];
        $base = $postbody['base'];

        $bdays = DB::select("
        SELECT name, DATE_FORMAT(birthday,'%m %d') as birthday
        FROM users
        WHERE  
        DATE_FORMAT(birthday,'%m-%d') BETWEEN
        DATE_FORMAT('$base','%m-%d')
        AND DATE_FORMAT(ADDDATE('$base', INTERVAL $interval DAY), '%m-%d') 
        OR
        DATE_FORMAT(birthday,'%m-%d') BETWEEN 
        DATE_FORMAT(SUBDATE('$base', INTERVAL $interval DAY), '%m-%d') 
        AND
        DATE_FORMAT('$base','%m-%d')
        ORDER BY DATE_FORMAT(birthday,'%m-%d')
        ;
       ");

        return response()->json(
            ['data' => $bdays]
        );
    }
}
