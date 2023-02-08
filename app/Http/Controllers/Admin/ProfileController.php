<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return 'show profile';
    }

    public function edit()
    {
        return 'edit';
    }

    public function update()
    {
    }
}
