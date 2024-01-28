<?php

namespace App\Http\Controllers;

use App\Models\Address;
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

        $request->validate([
            'name' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'distric' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',

        ]);

        $user = Auth::user();

        $address = $user->address ?? new Address();

        $address->user_id = $user->id;
        $address->address1 = $request->input('address1');
        $address->address2 = $request->input('address2');
        $address->distric = $request->input('distric');
        $address->province = $request->input('province');
        $address->postal_code = $request->input('postal_code');
        $address->country = $request->input('country');
        $address->city = $request->input('city');

        $address->save();

        $user->name = $request->name;

        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            // Store the new photo
            $photoPath = $request->file('photo')->store('profile-photos', 'public');
            $user->photo = $photoPath;

        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');

    }
}
