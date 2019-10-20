<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BirthdaysController extends Controller
{
    public function show(Request $request)
    {
        $postbody = $request->all();
        $interval = $postbody['interval'];

        $bdays = DB::select("
                SELECT name, DATE_FORMAT(birthday,'%m %d') as birthday
                FROM users
                WHERE DATE_FORMAT(birthday,'%m-%d') BETWEEN DATE_FORMAT(CURDATE(),'%m-%d')
                AND DATE_FORMAT(ADDDATE(NOW(), INTERVAL $interval DAY), '%m-%d') 
                ORDER BY DATE_FORMAT(birthday,'%m-%d');
       ");

        return response()->json(
            ['data' => $bdays]
        );
    }
}
