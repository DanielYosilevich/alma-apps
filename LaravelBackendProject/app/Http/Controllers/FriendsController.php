<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FriendsController extends Controller
{
    public function handleFriend(Request $request)
    {
        $postbody = $request->all();
        $id = $postbody['id'];
        if (empty($postbody['friends'])) {
            $affected = DB::update("
            UPDATE users 
            SET friends = NULL
            WHERE id = $id ");
        } else {
            $friends['friends'] = $postbody['friends'];
            $encoded = json_encode($friends);
            $affected = DB::update("
            UPDATE users 
            SET friends = '$encoded'
            WHERE id = $id ");
        }

        return response()->json(
            ['data' => $affected]
        );
    }
}