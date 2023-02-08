<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        return 'piani';
    }

    public function show()
    {
        return 'piano single';
    }
}
