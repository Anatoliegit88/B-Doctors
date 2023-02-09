<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::with('user_detail', 'specializations')->where('id', auth()->user()->id)->get();
        return view('Admin.profiles.show', compact('user'));
    }

    public function edit()
    {
        $user = User::with('user_detail', 'specializations')->where('id', auth()->user()->id)->get();
        $specializations = Specialization::all();
        return view('Admin.profiles.edit', compact('user', 'specializations'));
    }

    public function update(Request $request)
    {
        dd($request->all());

        // $data = $request->all();
        // return view('admin.profiles.show');
    }
}
