<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;


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
        $data = $request->all();
        $profile->update($data);

        $profile->user_detail()->updateOrCreate([
            'phone' => $data['phone'],
            'performance' => $data['performance'],
            'address' => $data['address'],
            'description' => $data['description'],
        ]);

        if ($request->has('specializations')) {
            $profile->specializations()->sync($request->specializations);
        } else {
            $profile->specializations()->detach();
        }

        return redirect()->route('admin.profiles.show', $profile->id);
    }
}
