<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        return view('Admin.Sponsors.index');
    }

    public function show()
    {
        return view('Admin.Sponsors.show');
    }
}
