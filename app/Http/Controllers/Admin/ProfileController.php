<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use App\Models\UserDetail;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function show(User $profile)
    {
        return view('Admin.profiles.show', compact('profile'));
    }

    public function edit()
    {
        $user = User::with('user_detail', 'specializations')->where('id', auth()->user()->id)->get();
        $specializations = Specialization::all();
        return view('Admin.profiles.edit', compact('user', 'specializations'));
    }

    public function update(Request $request, User $profile)
    {

        $userdetail = UserDetail::where('user_id', auth()->user()->id)->get();
        // dd($profile);

        $data = $request->all();
        $profile->update($data);

        if ($request->has('specializations')) {
            $profile->specializations()->sync($request->specializations);
        } else {
            $profile->specializations()->detach();
        }

        return redirect()->route('admin.profiles.show', $profile->id);


        // ----------------


    }
}
