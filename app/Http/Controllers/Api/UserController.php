<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\Sponsor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $specialization = Specialization::all();
        $id = $request->specialization_id;
        $vote = $request->vote;

        $users = User::with('user_detail', 'specializations', 'feedback')
        ->withCount('feedback')
        ->withAvg('feedback', 'vote')
        ->get();
    
        if ($request->specialization_id) {

            $users = User::whereHas('specializations', function ($q) use ($id) {
                $q->where('id', $id);
            })->withCount('feedback')->withAvg('feedback', 'vote')->with('user_detail', 'specializations', 'feedback')->get();

        }

        if ($request->vote) {
 
            $users = $users->where('feedback_avg_vote', '>=', $vote);

        }

        if ($request->feedback_num) {

            $users = $users->where('feedback_count', '>', $request->feedback_num);
            
        } 

        return response()->json([
            'success' => true,
            'results' => ['user' => $users, 'specializations' => $specialization]
        ]);
    }

    public function show($slug)
    {
        $user = User::with('user_detail', 'specializations', 'feedback')->where('slug', $slug)->first();
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
