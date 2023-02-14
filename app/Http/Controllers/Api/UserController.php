<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->test) {

            $users = User::with('specializations', 'user_detail', 'feedback')->where('specializations.id', $request->test)->get();
            
        } else {

            $users = User::with('user_detail', 'specializations', 'feedback')->get();
        }

        return response()->json([
            'success' => true,
            'results' => $users
        ]);
    }

    public function show($slug)
    {
        $user = User::with('user_detail', 'specializations')->get()->where('slug', $slug)->first();
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'No user'
            ]);
        }
    }
}
