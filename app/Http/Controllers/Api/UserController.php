<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $specialization = Specialization::all();
        $id = $request->specialization_id;
        $vote = $request->vote;

        if ($request->specialization_id && $request->vote) {

            $users1 = User::whereHas('specializations', function ($q) use($id) {
                $q->where('id', $id);
            })->withAvg('feedback', 'vote' )->with('user_detail', 'specializations', 'feedback')->get();

            $users = $users1->where('feedback_avg_vote', '>=', $vote);

        } else if ($request->specialization_id) {

            $users = User::whereHas('specializations', function ($q) use($id) {
                $q->where('id', $id);
            })->withAvg('feedback', 'vote' )->with('user_detail', 'specializations', 'feedback')->get();

        } else if ($request->vote) {
    
            $users1 = User::with('user_detail', 'specializations', 'feedback')->withAvg('feedback', 'vote' )->get();
            $users = $users1->where('feedback_avg_vote', '>=', $vote);

        } else {

            $users = User::with('user_detail', 'specializations', 'feedback')->withAvg('feedback', 'vote' )->get();
            
        }

        return response()->json([
            'success' => true,
            'results' => ['user' =>$users, 'specializations' => $specialization]
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
