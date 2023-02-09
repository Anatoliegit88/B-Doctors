<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        // $specializations = Specialization::where('user_id', auth()->user()->id)->get();
        $specializations = Specialization::all();
        return view('admin.specializations.index', compact('specializations'));
    }
}
