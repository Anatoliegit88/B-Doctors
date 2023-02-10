<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if($request->hasFile('photo')){
            if ($profile->user_detail->photo){
                Storage::delete($profile->user_detail->photo);
            }
            $img_path = Storage::put('images', $data['photo']); 
            $data['photo'] = $img_path;       
        }

        $profile->user_detail()->updateOrCreate([
            'phone' => $data['phone'],
            'performance' => $data['performance'],
            'photo' => $data['photo'],
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
