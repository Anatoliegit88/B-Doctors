<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('Admin.profiles.show');
    }

    public function edit()
    {
        return view('Admin.profiles.edit');
    }

    public function update()
    {
    }
}
