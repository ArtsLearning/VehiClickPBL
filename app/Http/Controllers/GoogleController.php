<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        $redirectUrl = request()->getHost() === 'localhost:8000' 
            ? 'http://localhost:8000/auth/google/callback'
            : 'https://vehiclick.web.id/auth/google/callback';

        return Socialite::driver('google')
            ->redirectUrl($redirectUrl)
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        $redirectUrl = request()->getHost() === 'localhost:8000' 
            ? 'http://localhost:8000/auth/google/callback'
            : 'https://vehiclick.web.id/auth/google/callback';

        try {
            $googleUser = Socialite::driver('google')
            ->redirectUrl($redirectUrl)
            ->user();
            
            $user = User::where('google_id', $googleUser->getId())->first();
            
            if ($user) {
                Auth::login($user);
                // Redirect ke dashboard atau home setelah login
                return redirect('/dashboard'); // atau ganti dengan '/home' jika menggunakan home
            } else {
                $existingUser = User::where('email', $googleUser->getEmail())->first();
                
                if ($existingUser) {
                    $existingUser->update([
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                        'email_verified_at' => now(),
                    ]);
                    Auth::login($existingUser);
                } else {
                    $newUser = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                        'email_verified_at' => now(),
                        'password' => Hash::make(Str::random(24)),
                    ]);
                    Auth::login($newUser);
                }
                
                // Redirect ke dashboard atau home setelah login
                return redirect('/dashboard'); // atau ganti dengan '/home'
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Terjadi kesalahan saat login dengan Google. Silakan coba lagi.');
        }
    }
}