<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('Admin.Sponsors.index', compact('sponsors'));
    }

    public function show()
    {
        $sponsors = Sponsor::all();
        return view('Admin.Sponsors.show', compact('sponsors'));
    }
}
