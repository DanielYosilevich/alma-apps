<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;

class DetailsController extends Controller
{
    public function showDetails($id)
    {
        $user = DB::select("SELECT * FROM users WHERE id = '$id'")[0];
        $users = DB::select("SELECT * FROM users WHERE id != '$id'");
        $friendships = DB::select("SELECT target FROM friendships WHERE userid = '$id'");
       
        return view('details', [
            'user' =>  json_encode($user, JSON_FORCE_OBJECT),
            'users' =>  json_encode($users, JSON_FORCE_OBJECT),
            'friendships' =>  json_encode($friendships, JSON_FORCE_OBJECT),
        ]);
    }
}
