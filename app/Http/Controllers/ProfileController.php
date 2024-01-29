<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;

        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            // Store the new photo
            $photoPath = $request->file('photo')->store('profile-photos', 'public');
            $user->photo = $photoPath;
            $user->save();

        }

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');

    }
}
