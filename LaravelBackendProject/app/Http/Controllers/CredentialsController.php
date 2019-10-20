<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;

class CredentialsController extends Controller
{
    public function checkCredentials(Request $request)
    {
        $postbody = $request->all();
        $email = $postbody['email'];
        $password = $postbody['password'];
        $user = DB::select("SELECT * FROM users WHERE email = '$email' ");
        $first = reset($user);
        if ($first && $first->password == $password) {
            $r = true;
            $url = route('details', ['id' => $first->id]);
            return response()->json(
                ['isValidated' => $r, 'url' => $url]
            );
        } else {
            $r = false;
            // Log::info('Failed Login ');
            return response()->json(
                ['isValidated' => $r]
            );
        }
    }
}
