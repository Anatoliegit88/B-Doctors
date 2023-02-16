<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store (Request $request) {
        $data = $request->all();
        $feedback = new Feedback();
        $feedback->vote = $data['vote'];
        $feedback->review = $data['review'];
        $feedback->reviewer_name = $data['reviewer_name'];
        $feedback->user_id = $data['user_id'];
        $feedback->save();
    }
}
