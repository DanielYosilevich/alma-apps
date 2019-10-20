<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    public function showDB()
    {
        $users = DB::select("SELECT * FROM users");

        return view('database', ['users' =>   json_encode($users, JSON_FORCE_OBJECT)]);
    }
}
