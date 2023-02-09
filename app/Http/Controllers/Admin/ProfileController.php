<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $user = User::where('id', auth()->user()->id)->get();
        return view('Admin.profiles.edit', compact('user'));
    }

    public function update()
    {
    }
}
