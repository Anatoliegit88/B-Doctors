<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('Admin.Feedback.index');
    }

    public function show()
    {
        return view('Admin.Feedback.show');
    }
}
