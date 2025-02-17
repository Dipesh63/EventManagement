<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackbygoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
           // dd($googleUser->getId()); // Debugging step

            $user = User::where('google_id', $googleUser->getId())->first();

            if (!$user) {
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password'  => "1234567"
                    
                ]);

                // Auth::login($newUser);
               // Auth::login($user);
                return redirect()->intended('dashboardnew2'); // Replace 'dashboard' if needed(login page)
            } else {
                Auth::login($user);
                return redirect()->intended('dashboardnew'); // Replace 'dashboard' if needed(profile page)
            }
        } catch (\Throwable $th) {
            // Print the exact error message for debugging
            dd('Something Went wrong! ' . $th->getMessage());
        }
    }

    // public function login_func()
    // {
    //     return view('signin'); // Blade file should be 'signin.blade.php'
    // }




//     public function dashboard()
// {
//     return view('dashboard');
// }
}
