<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'results' => $users
        ]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();;
        $users_details = UserDetail::all();
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
                'details' => $users_details
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'No user'
            ]);
        }
    }
}
