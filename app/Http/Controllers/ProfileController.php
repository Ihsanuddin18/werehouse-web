<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;




class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'Profil Berhasil Diperbarui !');
    }

    /**
     * Update the user's biography.
     */
    public function updateBiography(Request $request, $id): RedirectResponse
{       
    
        $user = User::findOrFail($id);
        $biography = $request->input('biography');
        $cleanBiography = Str::of(strip_tags($biography))->trim(); 
        $user->biography = $biography;
        $user->biography = $cleanBiography;
        $user->save();

        // Mengirimkan notifikasi
        Session::flash('status', 'Biografi Berhasil Diperbarui !');

        return redirect()->route('profile.edit')->with('status', 'Biografi Berhasil Diperbarui !');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
