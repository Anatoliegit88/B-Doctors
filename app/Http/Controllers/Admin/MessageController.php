<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return 'messages';
    }

    public function show()
    {
        return 'message singolo';
    }
}
