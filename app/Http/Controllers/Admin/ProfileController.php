<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // profile page show
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);

        $profile->phone = $request->phone;
        $profile->address = $request->address;

        // profile photo and document
        if ($request->hasFile('photo')) {
            if ($profile->photo) Storage::delete($profile->photo);
            $profile->photo = $request->file('photo')->store('profiles', 'public');
        }

        // profile document
        if ($request->hasFile('document')) {
            if ($profile->document) Storage::delete($profile->document);
            $profile->document = $request->file('document')->store('profiles/documents', 'public');
        }

        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}
